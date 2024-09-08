<?php
    /*
        Functions to automatize process.
    */

	/*
		Transforms the array formatted from excel into info json file.
		Params:
			$data: The formatted data.
		Data format:
			(.*?)\t(.*?)\t(.*?)\t(.*?)\t(.*?)\t(.*?)$
			["code" => "\1", "name" => "\2", "description" => "\3", "rarity" => "\4", "parts" => \5, "points" => \6],
			Then [] arround and delete last ,
	*/
	function excelToInfo($data)
	{
		$region = "";
		foreach($data as $k => $trea)
		{
			if($region == "")
			{
				$region = substr($trea["code"], 0, 3);
			}
			$data[$k]["rarity"] = substr($trea["rarity"], 0, 1);
			$data[$k]["type"] = substr($trea["code"], 4, 3);
		}
		$order = array("MON", "CUE", "JOY", "CER", "EQP", "EST", "FRA", "TES");
		usort($data, function ($a, $b) use ($order) {
			$ka = array_search($a['type'], $order);
			$kb = array_search($b['type'], $order);
			if ($ka == $kb) {
				return 0;
			}else{
				return ($ka < $kb) ? -1 : 1;
			}
		});
		file_put_contents("./assets/info/" . $region . ".json", json_encode($data, JSON_PRETTY_PRINT));
		echo "<p>Archivo $region creado correctamente</p>";
	}

	/*
		Transforms the info json file into calls of Archaios.
		Params:
			$code: The region code.
			$name: The region name / class in Archaios.
		Data format:
			(.*?)\t(.*?)\t(.*?)\t(.*?)\t(.*?)\t(.*?)$
			["code" => "\1", "name" => "\2", "description" => "\3", "rarity" => "\4", "parts" => \5, "points" => \6],
			Then [] arround and delete last ,
	*/
	function infoToArchaios($code, $name)
	{
		$nType = [
			"MON" => "COIN",
			"TES" => "TILE",
			"CUE" => "BEAD",
			"JOY" => "JEWELRY",
			"CER" => "CERAMIC",
			"EQP" => "EQUIP",
			"EST" => "STELE",
			"FRA" => "FRAGMENT"
		];
		$nRare = [
			"C" => "COMMON",
			"I" => "UNCOMMON",
			"R" => "RARE"
		];
		$info = json_decode(file_get_contents("./assets/info/" . $code . ".json"), true);
		$lastType = "MON";
		$calls = '';
		foreach ($info as $data) {
			if($data['parts'] > 0)
			{
				if($lastType != $data['type'])
				{
					$lastType = $data['type'];
					$calls .= '<br>';
				}
				$calls .=
					'this.treasures.add(new Treasure("' . $data['name'] . '", ' .
					$name . '.CODE, ' . 
					'ETreasureType.' . $nType[$data['type']] . ', ' .
					'"' . substr($data['code'], 8, 3) . '", ' .
					$data['parts'] . ', ' .
					$data['points'] . ', ' .
					'ERarity.' . $nRare[$data['rarity']] . ', ' .
					'"' . $data['description'] . '"' .
					'));<br>';
			}
		}
		echo $name . ' Archaios:<br>';
		echo $calls;
	}

	/*
		Divides a png image into separate files.
		Params:
			$image: The image path.
			$wd: The width in pixels to cut of each part.
			$hg: The height in pixels to cut of each part.
			$ignone: An array with the ignored sectors. 
	*/
	function divideImg($image, $wd, $hg, $ignore = array())
	{
		$num = 1;
		$ignored = 0;
		$save = dirname($image);
		$img = imagecreatefrompng($image);
		$size = getimagesize($image);
		$x = $size[0] / $wd;
		$y = $size[1] / $hg;
		for ($i = 0; $i < $y; $i++) { 
			for ($j=0; $j < $x; $j++) { 
				$crop = imagecrop($img, ['x' => $j * $wd, 'y' => $i * $hg, 'width' => $wd, 'height' => $hg]);
				if ($crop !== FALSE) {
					$res = imagecreatetruecolor($size[0], $size[1]);
					$alpha = imagecolorallocatealpha($res, 0, 0, 0, 127);
					imagefill($res, 0, 0, $alpha);
					imagesavealpha($res, true);
					
					imagecopy($res, $crop, $j * $wd, $i * $hg, 0, 0, $wd, $hg);
					$code = str_pad($num++ - $ignored, 4, '0', STR_PAD_LEFT);
					$path = $save . '/' . $code . '.png';
					if(!in_array($num - 1, $ignore))
					{
						imagepng($res, $path);
					}else{
						$ignored++;
					}
					imagedestroy($crop);
					imagedestroy($res);
				}
			}
		}
		imagedestroy($img);
		echo 'Todas las imágenes han sido guardadas con éxito.<br>';
	}
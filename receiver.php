<?php
	require_once("./constants.php");
	require_once("./models/TreasureModel.php");
	/* JSON format:
			uid: usercode
			codes:
				Códigos.

	*/
	$json = file_get_contents('php://input');
	$fdata = json_decode($json, true);
	
	$msg = ERROR_DATA;

	if(isset($fdata))
	{
		$usercode = $fdata['uid'] ?? -1;
		$data = $fdata['codes'];

		if($usercode == -1 || $usercode == "")
		{
			$msg = ERROR_USER;
		}else{
			$msg = CORRECT;
			$allowed = true;
			if(SECURITY_MODE)
			{
				$white = json_decode(file_get_contents('./data/filter/whitelist.json'), true);
				$white = $white["allow"];
				$allowed = in_array($usercode, $white);
			}else{
				$banned = json_decode(file_get_contents('./data/filter/blacklist.json'), true);
				$banned = $banned["block"];
				$allowed = !in_array($usercode, $banned);
			}
			if($allowed)
			{
				$model = TreasureModel::getInstance();
				foreach($data as $c)
				{
					$pattern = '/^[A-za-z]{3}_[A-za-z]{3}_[0-9]{3}_[0-9]{4}$/';
					if(preg_match($pattern, $c))
					{
						if($usercode != "-=Pruebas=-" || ($usercode == "-=Pruebas=-" && TEST))
						{
							$model->addTreasure($usercode, strtoupper($c));
						}else{
							$msg = NO_TEST;
						}
					}else{
						$msg = ERROR_DATA;
						break;
					}
				}
				$model->close();
			}else{
				$msg = BLOCKED_USER;
			}
		}
	}
	
	echo $msg;
	$actTime = date("Y-m-d H:i:s");
	if($fdata === null)
	{
		file_put_contents('./data/' . GAME . '/register.log', '[' . $actTime . '] ERROR. Datos nulos.' . PHP_EOL, FILE_APPEND);
	}else{
		$content = "";
		switch ($msg) {
			case CORRECT:
				$content = 'UID: ' . $fdata['uid'] . ' {' . implode(", ", $fdata['codes']) . '}';
			break;
			case BLOCKED_USER:
				$content = ' Intento de acceso por parte del usuario bloqueado: ' . $fdata['uid'] . '.';
			break;
		}
		file_put_contents('./data/' . GAME . '/register.log', '[' . $actTime . '] ' . $content . PHP_EOL, FILE_APPEND);
	}
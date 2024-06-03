<?php
	require_once(__DIR__ . '/../models/TreasureModel.php');

/*
	Makes the treasure exhibitor.
*/
class ExhibitorMaker {
	//The region info path.
	private const INFO_PATH = './assets/info/';
	//The default canvas size.
	private const DEFAULT_SIZE = 64;
	//The treasure model
	private $model = null;

	private const TYPE_NAME = [
		"MON" => "Monedas",
		"TES" => "Mosaicos",
		"CUE" => "Cuentas",
		"JOY" => "Joyería",
		"CER" => "Cerámica",
		"EQP" => "Equipamiento",
		"FRA" => "Otros"
	];

	/*
		Basic constructor.
	*/
	public function __construct()
	{
		$this->model = TreasureModel::getInstance();
	}

	/*
		Creates a percent bar.
		Params:
			$num: The actual number.
			$total: Tha total number.
		Return:
			The HTML of the generated bar.
	*/
	private function genPercent($num, $total, $region)
	{
		$percent = ($num / $total) * 100;
		$bar = 
		'<div class="progress" role="progressbar" aria-label="Completitud del tesoro" aria-valuenow="' . $num . '" aria-valuemin="0" aria-valuemax="' . $total . '">' .
			'<div class="progress-bar" style="width: ' . $percent . '%; background-image: url(/Museo/assets/img/' . $region . '/PB.png);"></div>' .
		'</div>';
		return $bar;
	}

	/*
		Makes the treasure card.
		Params:
			$treasure: The treasure data.
			$parts: The treasure parts.
			$links: If the links should be added.
		Return:
			The HTML to make the Bootstrap v5 card.
	*/
	private function makeCard($treasure, $parts, $links)
	{
		$region = substr($treasure['code'], 0, 3);
		$band = HTMLHelper::regionBand($region, $treasure['rarity']);
		$nParts = count($parts);
		$card =
				'<div id="card-' . $treasure['code'] . '" class="card treasure ' . strtolower($treasure['type']) . '">' .
					'<div class="card-body">' .
						'<span class="tcode">' . $treasure['code'] . '</span>' .
						'<h5 class="card-title">' . $treasure['name'] . '</h5>' .
						$band .
						'<div class="cv-container">' .
							'<canvas id="canvas-' . $treasure['code'] . '"></canvas>' .
						'</div>'.
						$band .
						'<ul class="list-group list-group-flush">' .
							'<li class="list-group-item description">' .
								$treasure['description'] .
							'</li>' .
							'<li class="list-group-item percent-parts">' .
								$this->genPercent($nParts, $treasure['parts'], $region) . '<span>' . $nParts . '/' . $treasure['parts'] . '</span>' .
							'</li>';
		if($links)
		{
			$card .=
							'<li class="list-group-item data">' .
								'<a href="/Museo/info/' . substr($treasure['code'], 0, 11) . '">Entregados</a>' .
							'</li>';
		}
		$card .=
						'</ul>' .
					'</div>' .
				'</div>';
		
		return $card;
	}

	/*
		Generates the script that creates the image.
		Params:
			$treasure: The treasure data.
			$parts: The treasure parts.
		Return:
			The script code inside an script tag.
	 */
	private function ensambleImg($treasure, $parts)
	{
		$full = count($parts) === $treasure['parts'];
		$path = $_SERVER['DOCUMENT_ROOT'] . '/Museo/assets/img/' . str_replace('_', '/', $treasure['code']) . '/';
		if(file_exists($path . 'full.png'))
		{
			if(FULL_IMAGES || $full) { $parts = ["full"]; }
			$size = getimagesize($path . 'full.png');
		} else {
			if(FULL_IMAGES || $full) { $parts = ["0001"]; }
			$size = getimagesize($path . '0001.png');
		}
		$extra = '';
		if($treasure['type'] == 'TES')
		{
			$extra = 'document.getElementById("card-' . $treasure['code'] . '").style = "--tes-wd: ' . $size[0] . 'px;";';
		}
		$script = 
					'<script>' .
						'ens = new Ensambler();' . 
						'ens.create("' . $treasure['code'] . '", ' . json_encode($parts) . ', ' . $size[0] . ', ' . $size[1] . ', ' . json_encode(file_exists($path . 'base.png')) . ', ' . json_encode(file_exists($path . 'upper.png')) . ');' .
						$extra .
					'</script>';
		
		return $script;
	}

	/*
		Makes the treasure exhibitor.
		Params:
			$treasure: The treasure data.
			$links: If the links should be added.
		Return:
			The HTML tags and the JS code to make the exhibitor.
	*/
	private function makeTreasure($treasure, $links)
	{
		$trea = $this->model->getTreasuresByCode($treasure['code']);
		$parts = array();
		foreach ($trea as $t) {
			$parts[] = substr($t['code'], -4);
		}
		$content = $this->makeCard($treasure, $parts, $links);
		$content .= $this->ensambleImg($treasure, $parts);

		return $content;
	}

	/*
		Makes all the exhibition of one region.
		Params:
			$region: The region code. RRR
	*/
	public function make($region)
	{
		$content = '<div id="exposition">';
		$data = json_decode(file_get_contents(self::INFO_PATH . $region . '.json'), true);
		$lastType = '';
		foreach ($data as $treasure) {
			if($treasure['parts'] > 0)
			{
				if($lastType != $treasure['type'])
				{
					$band = HTMLHelper::regionBand($region, 'I');
					$head = '<div class="section">' .
								$band .
								'<h2>' . ExhibitorMaker::TYPE_NAME[$treasure['type']] . '</h2>' .
								$band .
							'</div>';

					if($lastType !== '') {$content .= '</div>';}
					$lastType = $treasure['type'];
					$content .=
									$head .
								'<div class="row">';
				}
				$content .= $this->makeTreasure($treasure, true);
			}
		}
		$content .= '</div></div>';
		echo $content;
	}

	/*
		Makes the exhibition of one treasure.
		Params:
			$code: The treasure code. RRR_TTT_NNN
	*/
	public function makeOne($code)
	{
		$content = '<div id="exposition">' .
						'<div class="row">';
		$region = substr($code, 0, 3);
		$data = json_decode(file_get_contents(self::INFO_PATH . $region . '.json'), true);
		foreach ($data as $treasure) {
			if($code == $treasure['code'] && $treasure['parts'] > 0)
			{
				$content .= $this->makeTreasure($treasure, false);
				break;
			}
		}
		$content .= '</div></div>';
		echo $content;
	}
}
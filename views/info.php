<?php
	$model = TreasureModel::getInstance();
	$maker = new ExhibitorMaker();
	$params = trim($params);

	$maker->makeOne($params);
	$trea = $model->getFullTreasureInfo($params);

	$band = '';
	$region = substr($params, 0, 3);
	$band = HTMLHelper::regionBand($region, 'I');
	echo $band;

	if (count($trea) > 0) {
		$total = 0;
		$unit = 0;
		$act = '';
		$res = '';
		$names = '';
		$user = array();

		foreach ($trea as $treasure) {
			if($act == '') {
				$act = $treasure['code'];
			}
			if($act != $treasure['code'])
			{
				$res .= 
						'<div class="info-group">' .
							'<span>' . substr($act, -4) . ': ' . $unit . '</span><br>' .
							$band .
							$names .
						'</div>';
				$unit = 0;
				$names = '';
				$act = $treasure['code'];
			}
			$unit += $treasure['quantity'];
			$total += $treasure['quantity'];
			if(key_exists($treasure['name'], $user))
			{
				$user[$treasure['name']] += $treasure['quantity'];
			}else{
				$user[$treasure['name']] = $treasure['quantity'];
			}
			$names .= '<span class="names">' . $treasure['name'] . ': ' . $treasure['quantity'] . '</span><br>';
		}
		$res .= 
				'<div class="info-group">' .
					'<span>' . substr($treasure['code'], -4) . ': ' . $unit . '</span><br>' .
					$band .
					$names .
				'</div>';
		echo '<div class="row">' . $res . '</div>';
	} else {
		echo '<p>No hay partes de este tesoro todavía.</p>';
	}
?>
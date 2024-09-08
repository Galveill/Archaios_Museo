<?php
	/*
		Regions data and functions.
	*/
	class RegionsHelper
	{
		public const REGIONS = [
			"GRC"=> [
				"name" => "Grecia",
				"description" => "Grecia clásica y arcaica."
			],
			"IBR"=> [
				"name" => "Iberia",
				"description" => "Íberos, celtíberos, galaicos y otros celtas de la península ibérica."
			],
			"ROM"=> [
				"name" => "Roma",
				"description" => "La Monarquía, la República y el Imperio romano."
			],
			"EGP"=> [
				"name" => "Egipto",
				"description" => "El Antiguo Egipto.",
				"exp" => "arenas"
			],
			"PTR"=> [
				"name" => "Petra",
				"description" => "El reino nabateo.",
				"exp" => "arenas"
			]
		];

		public const EXPANSIONS = [
			"arenas" => [
				"name" => "Imperios de las arenas",
				"description" => "Regiones de antiguos imperios erigidos en terreno desértico."
			]
		];

		/*
			Returns the base regions description to show.
			Return:
				[code] Name - Description <br> for each region.
		*/
		public static function getBaseRegionsDesc()
		{
			$reg = '';
			foreach (RegionsHelper::REGIONS as $key => $data) {
				if(!array_key_exists("exp", $data))
				{
					$reg .= '[' . $key . '] ' . $data["name"] . ' - ' . $data["description"] . '<br>';
				}
			}
			return $reg;
		}

		/*
			Returns the sections with the expansion regions icon and description to show.
			Return:
				[code] Name - Description <br> for each region.
		*/
		public static function getExpRegionsDesc()
		{
			$act = '';
			$reg = '';
			foreach (RegionsHelper::REGIONS as $key => $data) {
				if(array_key_exists("exp", $data))
				{
					if($act != $data['exp'])
					{
						if($act != '') { $reg .= '</div></div>'; }
						$reg .= '<div class="basedivider"></div>';
						$act = $data['exp'];
						$exp = RegionsHelper::EXPANSIONS[$act];
						$reg .=
							'<div class="dual">' .
								'<img src="/Museo/assets/icon/' . $act . '.svg" alt="' . $exp['name'] . '">' .
								'<div>' .
									'<h5>' . $exp['name'] . '</h5>' .
									'<p>' . $exp['description'] . '</p>' .
									'<hr>';

					}
					$reg .= '[' . $key . '] ' . $data["name"] . ' - ' . $data["description"] . '<br>';
				}
			}
			$reg .= '</div></div>';
			return $reg;
		}

		/*
			Returns the data of the expansion.
			Params:
				$code: The region code.
			Return:
				The assoc array with the expansion data.
		*/
		public static function getExpansion($code)
		{
			if(array_key_exists($code, RegionsHelper::REGIONS))
			{
				$reg = RegionsHelper::REGIONS[$code];
				if(array_key_exists("exp", $reg))
				{
					return RegionsHelper::EXPANSIONS[$reg["exp"]];
				}
			}
		}
	}
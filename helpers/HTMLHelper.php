<?php

	/*
		HTML util functions.
	*/
	class HTMLHelper
	{
		/*
			Basic constructor.
		*/
		public function __construct() {}

		/*
			Creates the main menu.
			Params:
				$actual: The actual tab. Empty if in index.
		*/
		public static function mainMenu($actual)
		{
			$menu = '';

			foreach (RegionsHelper::REGIONS as $reg => $data) {
				$band = '<div class="band" style="background-image: url(/Museo/assets/img/' . $reg . '/C.png)"></div>';
				$exp = '<div class="exp-band ' . (array_key_exists("exp", $data) ? $data['exp'] . '-back' : '') . '"></div>';
				$menu .= 
				'<div class="nav-item' . ($reg == $actual ? ' active' : '') . '">'.
					$band .
					'<a class="nav-link' . ($reg == $actual ? ' active' : '') . '" href="/Museo/' . $reg . '">' . $data["name"] . '</a>' .
					(array_key_exists("exp", $data) ? $exp : '') .
				'</div>';
			}

			echo $menu;
		}

		/*
			Creates a region band.
			Params:
				$region: The region.
				$rarity: The rarity of the band to shown.
			Return:
				The div with the region rarity band.
		*/
		public static function regionBand($region, $rarity)
		{
			return '<div class="band" style="background-image: url(/Museo/assets/img/' . $region . '/' . $rarity . '.png)"></div>';
		}

		/*
			ucfirst UTF-8 safe.
		*/
		public static function mb_ucfirst($text)
		{
			$first = mb_strtoupper($text);
			$first = mb_substr($first, 0, 1);
			return $first . mb_substr($text, 1);
		}
	}
	
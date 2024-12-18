<?php
	require_once("./constants.php");

	require_once("./helpers/RegionsHelper.php");
	require_once("./helpers/HTMLHelper.php");
	require_once("./models/TreasureModel.php");
	require_once("./helpers/ExhibitorMaker.php");

	$view = null;
	$page = null;
	$params = null;
	$css = null;
	$js = null;

	$ruta = substr(htmlspecialchars($_SERVER['REQUEST_URI']), (strlen(SYSTEM_NAME) + 2));
	if($ruta != '')
	{
		if (preg_match('/^[a-zA-Z0-9_\/]+$/', $ruta))
		{
			if(file_exists('./assets/info/' . $ruta . '.json'))
			{
				$page = $ruta;
			}else{
				$view = './views/' . $ruta . '.php';
				if(!file_exists($view))
				{
					if(substr($ruta, 0, 4) == 'info')
					{
						$view = './views/info.php';
						$params = substr($ruta, 5);
						$css = array('info');
					}else{
						$view = null;
					}
				}
			}
		}
	}
	if(file_exists('./assets/css/' . $ruta . '.css')) { $css = array($ruta); }
	if(file_exists('./assets/js/' . $ruta . '.js')) { $js = array($ruta); }
	require('./header.php');

	if($page !== null)
	{
		$maker = new ExhibitorMaker();
		$maker->make($ruta);
	}else{
		if($view != null)
		{
			include($view);
		}else{
			include('./views/base.php');
		}
	}
?>

<?php
	require("./footer.php");
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/tools.css" type="text/css"/>
<link rel="stylesheet" href="css/videos/videos.css" type="text/css"/>
<link rel="stylesheet" href="css/videos/video.css" type="text/css"/>
<link rel="stylesheet" href="css/videos/serie.css" type="text/css"/>
<title>Intranet / ABM Videos</title>
<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["id"])) { $id=$_REQUEST["id"]; } else { $id="0"; }
	
	if ($t == "") header('location: ./login.html');

	require 'php/datos/clases.php';
	require 'php/datos/datos.php';
	require 'php/pages/menu.php';
	require 'php/datos/videos/clases.php';
	require 'php/datos/videos/datos.php';
	
	if (!$sesion->codigo)
	{
		require 'php/pages/videos/lista.php';
	}
	else if ($sesion->codigo == "sagas" || $sesion->codigo == "lista" || $sesion->codigo == "series")
	{
		require 'php/pages/videos/agregar.serie.php';
	} 
	else if ($sesion->codigo == "pelis")
	{
		require 'php/pages/videos/agregar.video.php';
	} else {
		switch($tipo->tipo)
		{
			case "sagas":
			case "series":
			case "lista":
				require 'php/pages/videos/modificar.serie.php';
				break;
			default:
				require 'php/pages/videos/modificar.video.php';
				break;
		}
	}
?>

<script language="javascript" src="js/videos.js"></script>
<script language="javascript" src="js/menu.js"></script>
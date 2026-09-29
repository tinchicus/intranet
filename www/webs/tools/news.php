<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/tools.css" type="text/css"/>
<link rel="stylesheet" href="css/news/news.css" type="text/css"/>
<link rel="stylesheet" href="css/news/ver.css" type="text/css"/>
<link rel="stylesheet" href="css/news/eliminar.css" type="text/css"/>
<link rel="stylesheet" href="css/news/agregar.css" type="text/css"/>
<link rel="stylesheet" href="css/news/modificar.css" type="text/css"/>
<title>Intranet / ABM Novedades</title>
<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	
	if ($t == "") header('location: ./login.html');
	
	require 'php/datos/clases.php';
	require 'php/datos/datos.php';
	require 'php/pages/menu.php';
	require 'php/datos/news/clases.php';
	require 'php/datos/news/lista.php';
	switch($dato_s->codigo)
	{
		case "nuevo":
			require 'php/pages/news/agregar.php';
			break;
		default:
			if (!$dato_s->codigo)
			{
				require 'php/pages/news/lista.php';
			} else {
				require 'php/datos/news/datos_mod.php';
				require 'php/pages/news/modificar.php';
			}
			break;
	}
?>
<script language="javascript" src="js/news.js"></script>
<script language="javascript" src="js/menu.js"></script>
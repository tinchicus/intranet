<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/tools.css" type="text/css"/>
<link rel="stylesheet" href="css/musica/musica.css" type="text/css"/>
<link rel="stylesheet" href="css/musica/cancion.css" type="text/css"/>
<link rel="stylesheet" href="css/musica/disco.css" type="text/css"/>
<link rel="stylesheet" href="css/musica/lista.css" type="text/css"/>
<title>Intranet / ABM Musica</title>
<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	
	if ($t == "") header('location: ./login.html');

	require 'php/datos/clases.php';
	require 'php/datos/datos.php';
	require 'php/pages/menu.php';
	require 'php/datos/musica/clases.php';
	require 'php/datos/musica/datos.php';
	require 'php/datos/musica/codigo.php';
	switch($sesion->id)
	{
		case "cancion":
			require 'php/pages/musica/agregar.cancion.php';
			break;
		case "disco":
			require 'php/pages/musica/agregar.disco.php';
			break;
		case "lista":
			require 'php/pages/musica/agregar.pl.php';
			break;
		default:
			require 'php/datos/musica/datos.modif.php';
			if ($sesion->tipo == "ar") require 'php/pages/musica/modif.cancion.php';
			if ($sesion->tipo == "al") require 'php/pages/musica/modif.disco.php';
			if ($sesion->tipo == "pl") require 'php/pages/musica/modif.pl.php';
			if (!$sesion->id) require 'php/pages/musica/lista.php';
			break;
	}
	
?>
<script language="javascript" src="js/musica.js"></script>
<script language="javascript" src="js/cancion.js"></script>
<script language="javascript" src="js/disco.js"></script>
<script language="javascript" src="js/lista.js"></script>
<script language="javascript" src="js/menu.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title>Intranet / Musica</title>
<link rel="stylesheet" href="css/lista.css" type="text/css"/>
<link rel="stylesheet" href="css/menu.css" type="text/css"/>
<link rel="stylesheet" href="css/filtros.css" type="text/css"/>
<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	
	if ($t=="") header('location: php/datos/sesion.php');
	
	require 'php/datos/clases.php';
	require 'php/datos/datos.php';
	require 'php/pages/menu.php';
	require 'php/pages/lista.php';
	require 'php/pages/arriba.php';
	require 'php/pages/filtros.php';
	
?>

<script language="javascript" src="js/musica.js"></script>
<script language="javascript" src="js/menu.js"></script>

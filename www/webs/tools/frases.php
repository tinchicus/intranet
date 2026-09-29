<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/tools.css" type="text/css"/>
<link rel="stylesheet" href="css/frases/frases.css" type="text/css"/>
<link rel="stylesheet" href="css/frases/agregar.css" type="text/css"/>
<link rel="stylesheet" href="css/frases/modificar.css" type="text/css"/>
<title>Intranet / ABM Frasess</title>
<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	
	if ($t == "") header('location: ./login.html');
	
	require 'php/datos/clases.php';
	require 'php/datos/datos.php';
	require 'php/pages/menu.php';
	require 'php/datos/frases/clases.php';
	require 'php/datos/frases/datos.php';
	switch($sesion->id)
	{
		case "nuevo":
			require 'php/pages/frases/agregar.php';
			break;
		default:
			if (!$sesion->id)
			{
				require 'php/pages/frases/lista.php';
			} else {
				require 'php/pages/frases/modificar.php';
			}
	}
?>
<script language="javascript" src="js/frases.js"></script>
<script language="javascript" src="js/menu.js"></script>
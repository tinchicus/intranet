<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/tools.css" type="text/css"/>
<link rel="stylesheet" href="css/users/users.css" type="text/css"/>
<link rel="stylesheet" href="css/users/acciones.css" type="text/css"/>
<link rel="stylesheet" href="css/users/ajax.css" type="text/css"/>
<title>Intranet / ABM Usuarios</title>
<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	
	if ($t == "") header('location: ./login.html');
	
	require 'php/datos/clases.php';
	require 'php/datos/datos.php';
	require 'php/pages/menu.php';
	require 'php/datos/users/clases.php';
	require 'php/datos/users/lista.php';
	switch($sesion->codigo)
	{
		case "nuevo":
			require 'php/pages/users/agregar.php';
			break;
		default:
			if (!$sesion->codigo)
			{
				require 'php/pages/users/lista.php';			
			} else {
				require 'php/pages/users/modificar.php';
			}
			break;
	}
?>

<script language="javascript" src="js/users.js"></script>
<script language="javascript" src="js/menu.js"></script>
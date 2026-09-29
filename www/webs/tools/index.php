<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/tools.css" type="text/css"/>
<title>Intranet / Tools</title>
<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	
	if ($t == "") { header('location: ./login.html'); }
	
	require 'php/datos/clases.php';
	require 'php/datos/datos.php';
	require 'php/pages/menu.php';
	require 'php/pages/lista.php';

?>
<script language="javascript" src="js/tools.js"></script>
<script language="javascript" src="js/menu.js"></script>

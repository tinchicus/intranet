<?php
	if (isset($_REQUEST["token"])) { $t=$_REQUEST["token"]; } else { $t=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	if (isset($_REQUEST["tipo"])) { $tipo=$_REQUEST["tipo"]; } else { $tipo=""; }
	if (isset($_REQUEST["texto"])) { $texto=$_REQUEST["texto"]; } else { $texto=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	$querySesion = "select usuario from sesiones where token='$t'";
	$qSesion = mysqli_query($con, $querySesion);
	while ($lele = mysqli_fetch_array($qSesion)) { $u = $lele[0]; }
	$queryUser = "select usuario from usuarios where uuid='$u'";
	$qUser = mysqli_query($con, $queryUser);
	while($lili = mysqli_fetch_array($qUser)) { $user = $lili[0]; }

	$queryModif = "update news set texto='" . htmlspecialchars($texto, ENT_QUOTES) . "', tipo='$tipo', modificado=NOW(), usuario='$user' where codigo='$codigo'";
	$qModif = mysqli_query($con, $queryModif);
	$queryLimpiar = "update sesiones set codigo=NULL where token='$t'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);
	
	header('location: ../../../news.php?t=' . $t . '&app=1');
?>
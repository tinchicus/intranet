<?php
	if (isset($_REQUEST["token"])) { $t=$_REQUEST["token"]; } else { $t=""; }
	if (isset($_REQUEST["texto"])) { $texto=$_REQUEST["texto"]; } else { $texto=""; }
	if (isset($_REQUEST["tipo"])) { $tipo=$_REQUEST["tipo"]; } else { $tipo=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	$querySesion = "select usuario from sesiones where token='$t'";
	$qSesion = mysqli_query($con, $querySesion);
	while ($lele = mysqli_fetch_array($qSesion)) { $u = $lele[0]; }
	$queryUser = "select usuario from usuarios where uuid='$u'";
	$qUser = mysqli_query($con, $queryUser);
	while($lili = mysqli_fetch_array($qUser)) { $user = $lili[0]; }
	
	$queryCodigo = "select codigo from news order by codigo desc limit 1";
	$qCodigo = mysqli_query($con, $queryCodigo);
	while($lala = mysqli_fetch_array($qCodigo)) { $codex = $lala[0]; }
	
	if (!$codex)
	{
		$codex = "NW00000000000001";
	} else {
		$codex++;
	}
	
	$fecha=date("Y-m-d");
	
	$queryAgregar = "insert into news values (NULL,'$codex','$fecha','$tipo','" . htmlspecialchars($texto, ENT_QUOTES) . "',NOW(),NOW(),'$user')";
	$qAgregar = mysqli_query($con, $queryAgregar);
	$queryLimpiar = "update sesiones set codigo=NULL where token='$t'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);

	header('location: ../../../news.php?t=' . $t . '&app=1');
?>
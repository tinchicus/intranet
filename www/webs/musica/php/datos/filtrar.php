<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["filtro1"])) { $filtro1=$_REQUEST["filtro1"]; } else { $filtro1=""; }
	if (isset($_REQUEST["filtro2"])) { $filtro2=$_REQUEST["filtro2"]; } else { $filtro2=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	if ($filtro1!="limpiar")
	{
		$queryCargar = "update sesiones set filtro1_musica='$filtro1', filtro2_musica='$filtro2' where token='$t'";
	} else {
		$queryCargar = "update sesiones set filtro1_musica=NULL, filtro2_musica=NULL where token='$t'";
	}
	$qCargar = mysqli_query($con, $queryCargar);
	
	header('location: ../../?t=' . $t);
?>
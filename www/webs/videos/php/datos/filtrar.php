<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["filtro1"])) { $filtro1=$_REQUEST["filtro1"]; } else { $filtro1=""; }
	if (isset($_REQUEST["filtro2"])) { $filtro2=$_REQUEST["filtro2"]; } else { $filtro2=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	if ($filtro1!="limpiar")
	{
		$queryFiltrar = "update sesiones set filtro1_videos='$filtro1', filtro2_videos='$filtro2' where token='$t'";
	} else {
		$queryFiltrar = "update sesiones set filtro1_videos=NULL, filtro2_videos=NULL where token='$t'";
	}
	$qFiltrar = mysqli_query($con, $queryFiltrar);
	mysqli_close($con);

	header('location: ../../?t=' . $t);
?>
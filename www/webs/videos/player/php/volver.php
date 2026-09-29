<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	if (isset($_REQUEST["tipo"])) { $tipo=$_REQUEST["tipo"]; } else { $tipo=""; } 
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	if ($tipo=="Video")
	{
		$queryCargar = "update sesiones set filtro1_musica=NULL, codigo=NULL, track=NULL where token='$t'";
		$qCargar = mysqli_query($con, $queryCargar);
	} else {
		$queryCargar = "update sesiones set filtro1_musica='$tipo', codigo='$codigo', track=0 where token='$t'";
		$qCargar = mysqli_query($con, $queryCargar);
	}
	mysqli_close($con);

	header('location: ../../?t=' . $t); 	
?>
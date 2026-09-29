<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	if (isset($_REQUEST["track"])) { $track=$_REQUEST["track"]; } else { $track="a"; }
	if (isset($_REQUEST["tipo"])) { $tipo=$_REQUEST["tipo"]; } else { $tipo=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	$queryCargar = "update sesiones set filtro1_musica='$tipo', codigo='$codigo', track=$track where token='$t'";
	$qCargar = mysqli_query($con, $queryCargar);
	
	mysqli_close($con);

	if ($tipo == "Video" || $track > 0)
	{
		header('location: ../../player/?t=' . $t); 
	} else {
		header('location: ../../?t=' . $t); 	
	} 
?>
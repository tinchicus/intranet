<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	if (isset($_REQUEST["tipo"])) { $tipo=$_REQUEST["tipo"]; } else { $tipo=""; }
	if (isset($_REQUEST["track"])) { $track=$_REQUEST["track"]; } else { $track="1"; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	$queryCargar = "update sesiones set codigo='$codigo',filtro1_videos='$tipo',track='$track' where token='$t'";
	$qCargar = mysqli_query($con, $queryCargar);
	
	header('location: ../../?t=' . $t);
?>
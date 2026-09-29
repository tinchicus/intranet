<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	$queryCargar = "update sesiones set codigo=NULL,filtro1_videos=NULL,track=NULL where token='$t'";
	$qCargar = mysqli_query($con, $queryCargar);
	
	header('location: ../../../?t=' . $t);
?>
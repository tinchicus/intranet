<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	$querySalir = "delete from sesiones where token='$t'";
	$qSalir = mysqli_query($con, $querySalir);
	
	header('location: ../../../sitio/');
?>
<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }

	include("intranet.inc");
	$con=base_connect("intranet");
	
	$queryAgregar = "update sesiones set codigo='$codigo' where token='$t'";
	$qAgregar = mysqli_query($con, $queryAgregar);
	
	header('location: ../../../users.php?t=' . $t . '&app=1');
?>
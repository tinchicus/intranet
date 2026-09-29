<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	$queryEliminar="delete from news where codigo='$codigo'";
	$qEliminar = mysqli_query($con, $queryEliminar);
	
	header('location: ../../../news.php?t=' . $t . '&app=1');
?>
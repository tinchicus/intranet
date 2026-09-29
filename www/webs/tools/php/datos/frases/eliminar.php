<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["id"])) { $id=$_REQUEST["id"]; } else { $id=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");

	$queryEliminar = "delete from frases where id = $id";
	$qEliminar = mysqli_query($con, $queryEliminar);
	
	header('location: ../../../frases.php?t=' . $t . '&app=1');
?>
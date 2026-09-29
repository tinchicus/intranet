<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["id"])) { $u=$_REQUEST["id"]; } else { $u=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");	
	
	$queryEliminar = "delete from usuarios where uuid='$u' and estado='Bloqueado'";
	$qEliminar = mysqli_query($con, $queryEliminar);

	header('location: ../../../users.php?t=' . $t . '&app=1'); 
?>
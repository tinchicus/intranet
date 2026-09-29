<?php
	if (isset($_REQUEST["t"])) { $token=$_REQUEST["t"]; } else { $token=""; }

	include("intranet.inc");
	$con=base_connect("intranet");
	
	$queryUser = "select uuid from usuarios where token_tools = '$token'";
	$qUser = mysqli_query($con, $queryUser);
	while($lala = mysqli_fetch_array($qUser)) { $uuid = $lala[0]; }
	$querySalir = "update usuarios set token_tools='' where uuid='$uuid'";
	$qSalir = mysqli_query($con, $querySalir);
	$querySalir = "delete from sesiones where token='$token'";
	$qSalir = mysqli_query($con, $querySalir);

	header('Location: ../../');	
?>
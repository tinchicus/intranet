<?php
	$con=base_connect("intranet");

	$querySesion = "select usuario from sesiones where token='$t'";
	$qSesion = mysqli_query($con, $querySesion);
	while($lala = mysqli_fetch_array($qSesion)) { $userId = $lala[0]; }
	
	$datos = new Usuario();
	$queryDatos = "select usuario, nombre, apellido, email, rol from usuarios where token_tools='$t' and uuid='$userId'";
	$qDatos = mysqli_query($con, $queryDatos);
	while($lele = mysqli_fetch_array($qDatos))
	{
		$datos->userid = $lele[0];
		$datos->nombre = $lele[1];
		$datos->apellido = $lele[2];
		$datos->email = $lele[3];
		$datos->rol = $lele[4];
	}
	
	if ($datos->userid == "") header('location: ./login.html');
?>
<?php
	if (isset($_REQUEST["user"])) { $user_id=$_REQUEST["user"]; } else { $user_id=""; }
	if (isset($_REQUEST["pass"])) { $pass_id=$_REQUEST["pass"]; } else { $pass_id=""; }

	include("intranet.inc");
	$con=base_connect("intranet");

	$queryClave = "select clave,uuid,rol,estado from usuarios where usuario='$user_id'";
	$qClave=mysqli_query($con, $queryClave);
	while($linea=mysqli_fetch_array($qClave)) { $clave=$linea[0]; $uuid=$linea[1]; $role=$linea[2]; $state=$linea[3]; }
	
	if ($state != "Bloqueado")
	{
		if ($role != "1000")
		{
			if (password_verify($pass_id, $clave))
			{
				$num = random_bytes(5);
				$token=bin2hex($num);
				$t=$token;
				$queryIngreso="update usuarios set token_tools='$token', ingreso=NOW() where usuario='$user_id'";
				$qIngreso=mysqli_query($con, $queryIngreso);
				$queryIngreso="insert into sesiones (id, token, usuario, filtro1_musica, filtro2_musica, orden_musica, filtro1_videos, filtro2_videos, orden_videos, codigo, track, creado, modificado) values (NULL,'$token','$uuid','','','','','','','',0,NOW(),NOW())";
				$qIngreso=mysqli_query($con, $queryIngreso);
				header('location: ../../?t=' . $t);
			} else {
				header('location: ../../login.html?t=-1');
			}
		} else {
			header('location: ../../login.html?t=-2');
		}
	} else {
		header('location: ../../login.html?t=-3');
	}
?>
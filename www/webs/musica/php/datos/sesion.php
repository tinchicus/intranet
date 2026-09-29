<?php

	include("intranet.inc");
	$con=base_connect("intranet");
	
	$num = random_bytes(5);
	$keyId=bin2hex($num);
	$queryIngreso="insert into sesiones (id, token, usuario, filtro1_musica, filtro2_musica, orden_musica, filtro1_videos, filtro2_videos, orden_videos, codigo, track, creado, modificado) values (NULL,'$keyId','anonimo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NOW(),NOW())";
	echo $queryIngreso;
	$qIngreso=mysqli_query($con, $queryIngreso);
		
	header('location: ../../?t=' . $keyId);

?>
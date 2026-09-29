<?php
	if (isset($_REQUEST["token"])) { $t=$_REQUEST["token"]; } else { $t=""; }
	if (isset($_REQUEST["uuid_mod"])) { $u=$_REQUEST["uuid_mod"]; } else { $u=""; }
	if (isset($_REQUEST["usuario"])) { $usuario=$_REQUEST["usuario"]; } else { $usuario=""; }
	if (isset($_REQUEST["nombre"])) { $nombre=$_REQUEST["nombre"]; } else { $nombre=""; }
	if (isset($_REQUEST["apellido"])) { $apellido=$_REQUEST["apellido"]; } else { $apellido=""; }
	if (isset($_REQUEST["email"])) { $email=$_REQUEST["email"]; } else { $email=""; }
	if (isset($_REQUEST["rol"])) { $rol=$_REQUEST["rol"]; } else { $rol=""; }
	if (isset($_REQUEST["estado"])) { $estado=$_REQUEST["estado"]; } else { $estado=""; }
	if (isset($_REQUEST["notas"])) { $notas=$_REQUEST["notas"]; } else { $notas=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	if ($estado == "Bloqueado")
	{
		$queryToken = "update usuarios set token_tools=NULL where uuid='$u'";
		$qToken = mysqli_query($con, $queryToken);
	}

	$queryModif = "update usuarios set nombre='" . htmlspecialchars($nombre, ENT_QUOTES) . "', apellido='" . htmlspecialchars($apellido, ENT_QUOTES) . "', email='$email', rol='$rol', estado='$estado', comentario='" . htmlspecialchars($notas, ENT_QUOTES) . "', modificado=NOW() where uuid='$u'";
	$qModif = mysqli_query($con, $queryModif);
	$queryLimpiar = "update sesiones set codigo=NULL where token='$t'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);
	
	header('location: ../../../users.php?t=' . $t . '&app=1');
?>
<?php
	if (isset($_REQUEST["token"])) { $t=$_REQUEST["token"]; } else { $t=""; }
	if (isset($_REQUEST["user"])) { $usuario=$_REQUEST["user"]; } else { $usuario=""; }
	if (isset($_REQUEST["nombre"])) { $nombre=$_REQUEST["nombre"]; } else { $nombre=""; }
	if (isset($_REQUEST["apellido"])) { $apellido=$_REQUEST["apellido"]; } else { $apellido=""; }
	if (isset($_REQUEST["email"])) { $email=$_REQUEST["email"]; } else { $email=""; }
	if (isset($_REQUEST["rol"])) { $rol=$_REQUEST["rol"]; } else { $rol=""; }
	if (isset($_REQUEST["clave1"])) { $clave=$_REQUEST["clave1"]; } else { $clave=""; }
	if (isset($_REQUEST["notas"])) { $texto=$_REQUEST["notas"]; } else { $texto=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	$pass = password_hash($clave, PASSWORD_DEFAULT,['cost'=>12]);
	$uuid = bin2hex($usuario);
	$queryIngresar = "insert into usuarios (id,usuario,nombre,apellido,email,clave,token_ingreso,token_tools,token_reset,rol,estado,creado,modificado,ingreso,ip,comentario,uuid) values (NULL,'$usuario','" . htmlspecialchars($nombre, ENT_QUOTES) . "','" . htmlspecialchars($apellido, ENT_QUOTES) . "','$email','$pass','','','','$rol','Activo',now(),now(),NULL,'','" . htmlspecialchars($texto, ENT_QUOTES) . "','$uuid')";
	$qIngresar = mysqli_query($con, $queryIngresar);
	$queryLimpiar = "update sesiones set codigo=NULL where token='$t'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);
		
	header('location: ../../../users.php?t=' . $t . '&app=1');

?>
<?php
	if (isset($_REQUEST["usuario"])) { $usuario=$_REQUEST["usuario"]; } else { $usuario=""; }
	if (isset($_REQUEST["nombre"])) { $nombre=$_REQUEST["nombre"]; } else { $nombre=""; }
	if (isset($_REQUEST["apellido"])) { $apellido=$_REQUEST["apellido"]; } else { $apellido=""; }
	if (isset($_REQUEST["email"])) { $email=$_REQUEST["email"]; } else { $email=""; }
	if (isset($_REQUEST["rol"])) { $rol=$_REQUEST["rol"]; } else { $rol=""; }
	if (isset($_REQUEST["estado"])) { $estado=$_REQUEST["estado"]; } else { $estado=""; }
	if (isset($_REQUEST["notas"])) { $notas=$_REQUEST["notas"]; } else { $notas=""; }

	$l = 0;
	$lista = Array();
	$queryLista = "select usuario, nombre, apellido, email, rol, estado, creado, modificado, ingreso, ip, comentario, uuid from usuarios order by usuario asc";
	$qLista = mysqli_query($con, $queryLista);
	while($lala = mysqli_fetch_array($qLista))
	{
		$datos_l[$l] = new Datos();
		$datos_l[$l]->usuario = $lala[0];
		$datos_l[$l]->nombre = $lala[1];
		$datos_l[$l]->apellido = $lala[2];
		$datos_l[$l]->email = $lala[3];
		$datos_l[$l]->rol = $lala[4];
		$datos_l[$l]->estado = $lala[5];
		$datos_l[$l]->creado = $lala[6];
		$datos_l[$l]->modificado = $lala[7];
		$datos_l[$l]->ingreso = $lala[8];
		$datos_l[$l]->ip = $lala[9];
		$datos_l[$l]->notas = $lala[10];
		$datos_l[$l]->uuid = $lala[11];
		switch($datos_l[$l]->rol)
		{
			case 1000:
				$datos_l[$l]->rol_label = "Invitado";
				break;
			case 1001:
				$datos_l[$l]->rol_label = "Usuario";
				break;
			case 1002:
				$datos_l[$l]->rol_label = "U. Avanzado";
				break;
			case 1003:
				$datos_l[$l]->rol_label = "Administrador";
				break;
		}
		array_push($lista, $datos_l[$l]);
		$l++;
	}
	
	$querySesion = "select codigo from sesiones where token='$t'";
	$qSesion = mysqli_query($con, $querySesion);
	$sesion = new Datos();
	while($lele = mysqli_fetch_array($qSesion)) { $sesion->codigo = $lele[0]; }
	
	if (!$nombre && !$apellido && !$rol && $sesion->codigo)
	{
		$queryDatos = "select usuario,nombre,apellido,email,rol,estado,comentario from usuarios where uuid='" . $sesion->codigo . "'";
		$qDatos = mysqli_query($con, $queryDatos);
		while($lili = mysqli_fetch_array($qDatos))
		{
			$usuario = $lili[0];
			$nombre = $lili[1];
			$apellido = $lili[2];
			$email = $lili[3];
			$rol = $lili[4];
			$estado = $lili[5];
			$notas = $lili[6];
		}
	}
?>
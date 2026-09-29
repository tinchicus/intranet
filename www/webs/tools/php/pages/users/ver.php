<?php
	if (isset($_REQUEST["uuid"])) { $u=$_REQUEST["uuid"]; } else { $u=""; }

	include("intranet.inc");
	$con=base_connect("intranet");	

	class Datos
	{
		public $userid;
		public $nombre;
		public $apellido;
		public $email;
		public $rol;
		public $rol_label;
		public $estado;
		public $notas;
		public $creado;
		public $modificado;
		public $ingreso;
		public $ip;
		public $uuid;		
	}

	$queryLista = "select usuario, nombre, apellido, email, rol, estado, creado, modificado, ingreso, ip, comentario, uuid from usuarios where uuid='$u'";
	$qLista = mysqli_query($con, $queryLista);
	while($lala = mysqli_fetch_array($qLista))
	{
		$datos_l = new Datos();
		$usuario = $lala[0];
		$nombre = $lala[1];
		$apellido = $lala[2];
		$email = $lala[3];
		$rol = $lala[4];
		$estado = $lala[5];
		$creado = $lala[6];
		$modificado = $lala[7];
		$ingreso = $lala[8];
		$ip = $lala[9];
		$notas = $lala[10];
		$uuid = $lala[11];
		switch($rol)
		{
			case 1000:
				$rol_label = "Invitado";
				break;
			case 1001:
				$rol_label = "Usuario";
				break;
			case 1002:
				$rol_label = "U. Avanzado";
				break;
			case 1003:
				$rol_label = "Administrador";
				break;
		}
	}

	function convertir($texto)
	{
		$salida = "";
		for($i=0; $i < strlen($texto); $i++)
		{
			$letra = substr($texto,$i,1);
			if (ord($letra) == 13) $letra = "<br>";
			$salida = $salida . $letra;
		}
		return $salida;
	}
?>
<div class="capa_marco_ajax_info">
	<div class="capa_tabla_ajax_info">
		<div class="capa_celda_ajax_titulo">Datos del usuario seleccionado</div>
	</div>
	<div class="capa_tabla_ajax_info">
		<div class="capa_tr_ajax_info">
			<div class="capa_celda_ajax_info_01">UUID:</div>
			<div class="capa_celda_ajax_info_02"><?= $uuid; ?></div>
		</div>
		<div class="capa_tr_ajax_info">
			<div class="capa_celda_ajax_info_01">Usuario:</div>
			<div class="capa_celda_ajax_info_02"><?= $usuario; ?></div>
		</div>
		<div class="capa_tr_ajax_info">
			<div class="capa_celda_ajax_info_01">Apellido, Nombre:</div>
			<div class="capa_celda_ajax_info_02"><?= $apellido; ?>, <?= $nombre; ?></div>
		</div>
		<div class="capa_tr_ajax_info">
			<div class="capa_celda_ajax_info_01">E-mail:</div>
			<div class="capa_celda_ajax_info_02"><?= $email; ?></div>
		</div>
		<div class="capa_tr_ajax_info">
			<div class="capa_celda_ajax_info_01">Rol:</div>
			<div class="capa_celda_ajax_info_02"><?= $rol_label; ?></div>
		</div>
		<div class="capa_tr_ajax_info">
			<div class="capa_celda_ajax_info_01">Estado:</div>
			<div class="capa_celda_ajax_info_02"><?= $estado; ?></div>
		</div>
		<div class="capa_tr_ajax_info">
			<div class="capa_celda_ajax_info_03">Notas:</div>
			<div class="capa_celda_ajax_info_04"><?= convertir($notas); ?></div>
		</div>
	</div>
	<div class="capa_tabla_ajax_info">
		<div class="capa_celda_ajax_titulo">Datos del log</div>
	</div>
	<div class="capa_tabla_ajax_info">
		<div class="capa_tr_ajax_info">
			<div class="capa_celda_ajax_info_01">Creado:</div>
			<div class="capa_celda_ajax_info_02"><?= $creado; ?></div>
		</div>
		<div class="capa_tr_ajax_info">
			<div class="capa_celda_ajax_info_01">Modificado:</div>
			<div class="capa_celda_ajax_info_02"><?= $modificado; ?></div>
		</div>
		<div class="capa_tr_ajax_info">
			<div class="capa_celda_ajax_info_01">Ult. Ingreso:</div>
			<div class="capa_celda_ajax_info_02"><?= $ingreso; ?></div>
		</div>
	</div>
</div>
<div class="capa_ajax_boton">
	<button type="button" onClick="cerrar_info()" class="boton_cerrar">Cerrar</button>
</div>

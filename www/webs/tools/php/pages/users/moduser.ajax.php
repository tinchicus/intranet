<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["u"])) { $u=$_REQUEST["u"]; } else { $u=""; }

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
		$datos_l->usuario = $lala[0];
		$datos_l->nombre = $lala[1];
		$datos_l->apellido = $lala[2];
		$datos_l->email = $lala[3];
		$datos_l->rol = $lala[4];
		$datos_l->estado = $lala[5];
		$datos_l->creado = $lala[6];
		$datos_l->modificado = $lala[7];
		$datos_l->ingreso = $lala[8];
		$datos_l->ip = $lala[9];
		$datos_l->notas = $lala[10];
		$datos_l->uuid = $lala[11];
	}

?>
<form id="form_mod_usr" name="form_mod_usr" method="post" action="php/datos/users/modificar.php">
	<input type="hidden" id="t" name="t" value="<?= $t; ?>">
	<input type="hidden" id="u" name="u" value="<?= $u; ?>">
	<table class="tabla_mod_user" style=" ">
		<tr>
			<td class="td_mod_user_1">Usuario:</td>
			<td class="td_mod_user_2"><?= $datos_l->usuario; ?></td>
		</tr>
		<tr>
			<td class="td_mod_user_1">Nombre:</td>
			<td class="td_mod_user_2"><input type="text" id="nombre" name="nombre" value="<?= $datos_l->nombre; ?>" style="width:70%; "></td>
		</tr>
		<tr>
			<td class="td_mod_user_1">Apellido:</td>
			<td class="td_mod_user_2"><input type="text" id="apellido" name="apellido" value="<?= $datos_l->apellido; ?>" style="width:70%; "></td>
		</tr>
		<tr>
			<td class="td_mod_user_1">E-mail:</td>
			<td class="td_mod_user_2"><input type="text" id="email" name="email" value="<?= $datos_l->email; ?>" style="width:70%; "></td>
		</tr>
		<tr>
			<td class="td_mod_user_1">Rol</td>
			<td class="td_mod_user_2">
				<select id="rol" name="rol">
					<option value="">--</option>
					<option value="1000" <?= $datos_l->rol == 1000 ? "selected" : ""; ?>>Invitado</option>
					<option value="1001" <?= $datos_l->rol == 1001 ? "selected" : ""; ?>>Usuario</option>
					<option value="1002" <?= $datos_l->rol == 1002 ? "selected" : ""; ?>>Usuario Avanzado</option>
					<option value="1003" <?= $datos_l->rol == 1003 ? "selected" : ""; ?>>Administraddor</option>
				</select>			
			</td>
		</tr>
		<tr>
			<td class="td_mod_user_1">Estado:</td>
			<td class="td_mod_user_2">
				<select id="estado" name="estado">
					<option value="">--</option>
					<option value="Activo" <?= $datos_l->estado == "Activo" ? "selected" : ""; ?>>Activo</option>
					<option value="Bloqueado" <?= $datos_l->estado == "Bloqueado" ? "selected" : ""; ?>>Bloqueado</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_mod_user_3">Notas:</td>
			<td class="td_mod_user_2">
			<textarea id="notas" name="notas" style="width:70%; height:100; "><?= $datos_l->notas; ?></textarea>			
			</td>
		</tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr>
			<td class="td_mod_user_1">
				<button style="cursor:pointer; ">Modificar</button>
			</td>
			<td class="td_mod_user_2">
				<button type="button" style="cursor:pointer; " onClick="cancelar_mod()">Cancelar</button>			
			</td>
		</tr>
	</table>
</form>
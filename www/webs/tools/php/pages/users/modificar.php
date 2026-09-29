<form id="form_mod_user" name="form_mod_user" action="" method="post">
<input type="hidden" id="token" name="token" value="<?= $t; ?>">
<input type="hidden" id="uuid_mod" name="uuid_mod" value="<?= $sesion->codigo; ?>">
<div class="capa_marco_general_users">
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Usuario:</div>
			<div class="capa_celda_datos_02"><?= $usuario; ?></div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Nombre:</div>
			<div class="capa_celda_datos_02"><input type="text" id="nombre" name="nombre" value="<?= $nombre; ?>" style="width:70% "></div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Apellido:</div>
			<div class="capa_celda_datos_02"><input type="text" id="apellido" name="apellido" value="<?= $apellido; ?>" style="width:70% "></div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">E-mail:</div>
			<div class="capa_celda_datos_02"><input type="text" id="email" name="email" value="<?= $email; ?>" style="width:70% "></div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Rol:</div>
			<div class="capa_celda_datos_02">
				<select id="rol" name="rol">
					<option value="">--</option>
					<option value="1000" <?= $rol == 1000 ? "selected" : ""; ?>>Invitado</option>
					<option value="1001" <?= $rol == 1001 ? "selected" : ""; ?>>Usuario</option>
					<option value="1002" <?= $rol == 1002 ? "selected" : ""; ?>>Usuario Avanzado</option>
					<option value="1003" <?= $rol == 1003 ? "selected" : ""; ?>>Administraddor</option>
				</select>			
			</div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Estado:</div>
			<div class="capa_celda_datos_02">
				<select id="estado" name="estado">
					<option value="">--</option>
					<option value="Activo" <?= $estado == "Activo" ? "selected" : ""; ?>>Activo</option>
					<option value="Bloqueado" <?= $estado == "Bloqueado" ? "selected" : ""; ?>>Bloqueado</option>
				</select>
			</div>
		</div>
	</div>
	<div class="capa_linea_datos_texto">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Notas:</div>
			<div class="capa_celda_datos_02">
				<textarea id="notas" name="notas" style="width:70%; height:100%; "><?= $notas; ?></textarea>
			</div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_boton">
				<button type="button" name="boton_accion_mod" style="width:150; cursor:pointer; ">Modificar</button>
			</div>
			<div class="capa_celda_datos_boton">
				<button type="button" name="boton_accion_mod" style="width:150; cursor:pointer; ">Cancelar</button>			
			</div>
		</div>
	</div>
</div>
</form>
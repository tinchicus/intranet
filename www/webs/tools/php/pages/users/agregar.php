<form id="form_add_user" name="form_add_user" action="" method="post">
<input type="hidden" id="token" name="token" value="<?= $t; ?>">
<div class="capa_marco_general_users">
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Usuario:</div>
			<div class="capa_celda_datos_02"><input type="text" id="user" name="user" value="" style="width:70% "></div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Nombre:</div>
			<div class="capa_celda_datos_02"><input type="text" id="nombre" name="nombre" value="" style="width:70% "></div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Apellido:</div>
			<div class="capa_celda_datos_02"><input type="text" id="apellido" name="apellido" value="" style="width:70% "></div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">E-mail:</div>
			<div class="capa_celda_datos_02"><input type="text" id="email" name="email" value="" style="width:70% "></div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Password:</div>
			<div class="capa_celda_datos_02"><input type="password" id="clave1" name="clave1" value="" style="width:70% "></div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Rep. Password:</div>
			<div class="capa_celda_datos_02"><input type="password" id="clave2" name="clave2" value="" style="width:70% "></div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Rol:</div>
			<div class="capa_celda_datos_02">
				<select id="rol" name="rol">
					<option value="">--</option>
					<option value="1000">Invitado</option>
					<option value="1001">Usuario</option>
					<option value="1002">Usuario Avanzado</option>
					<option value="1003">Administraddor</option>
				</select>			
			</div>
		</div>
	</div>
	<div class="capa_linea_datos_texto">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Notas:</div>
			<div class="capa_celda_datos_02">
				<textarea id="notas" name="notas" style="width:70%; height:100%; "></textarea>
			</div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_boton">
				<button type="button" name="boton_accion_add" style="width:150; cursor:pointer; ">Agregar</button>
			</div>
			<div class="capa_celda_datos_boton">
				<button type="button" name="boton_accion_add" style="width:150; cursor:pointer; ">Cancelar</button>			
			</div>
		</div>
	</div>
</div>
</form>
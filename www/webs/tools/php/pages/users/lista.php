<div class="capa_marco_general_users">
	<div class="capa_linea_datos">
		<button type="button" id="boton-agregar-usuario">Agregar nuevo usuario</button>
	</div>
	<div class="capa_grilla_lista_users">
		<div id="capa_titulo_01" class="capa_tabla_titulo_lista">
			<div class="capa_celda_lista_users">Usuario</div>
		</div>
		<div id="capa_titulo_02" class="capa_tabla_titulo_lista">
			<div class="capa_celda_lista_users">Nombre y Apellido</div>
		</div>
		<div id="capa_titulo_03" class="capa_tabla_titulo_lista">
			<div class="capa_celda_lista_users">Rol</div>
		</div>
		<div id="capa_titulo_04" class="capa_tabla_titulo_lista">
			<div class="capa_celda_lista_users">Acciones</div>
		</div>
		<?php foreach($lista as $l) { ?>
		<div id="capa_titulo_01" class="capa_tabla_datos_lista" style="background-color:<?= $l->estado != "Bloqueado" ? "#fff" : "#CCC"; ?>; ">
			<div name="capa_user_dato" class="capa_celda_lista_users"><?= $l->usuario; ?></div>
		</div>
		<div id="capa_titulo_02" class="capa_tabla_datos_lista" style="background-color:<?= $l->estado != "Bloqueado" ? "#fff" : "#CCC"; ?>; ">
			<div class="capa_celda_lista_users"><?= $l->nombre; ?> <?= $l->apellido; ?></div>
		</div>
		<div id="capa_titulo_03" class="capa_tabla_datos_lista" style="background-color:<?= $l->estado != "Bloqueado" ? "#fff" : "#CCC"; ?>; ">
			<div class="capa_celda_lista_users"><?= $l->rol_label; ?></div>
		</div>
		<div id="capa_titulo_04" class="capa_tabla_datos_lista" style="background-color:<?= $l->estado != "Bloqueado" ? "#fff" : "#CCC"; ?>; ">
			<div class="capa_celda_lista_users">
				<input type="hidden" id="userid" name="userid" value="<?= $l->uuid; ?>">
				<button type="button" name="boton_usuario_mod" class="boton_lista_user"><img src="pics/tools.png" class="img_boton_lista_user"></button>
				<button type="button" name="boton_usuario_pwd" class="boton_lista_user"><img src="pics/passwd.png" class="img_boton_lista_user"></button>
				<button type="button" name="boton_usuario_ver" class="boton_lista_user"><img src="pics/info.png" class="img_boton_lista_user"></button>
				<button type="button" name="boton_usuario_del" class="boton_lista_user" style="visibility:<?= $l->estado == "Bloqueado" ? "visible" : "hidden"; ?> ">
				<img src="pics/cerrarmhm.png" class="img_boton_lista_user">
				</button>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<div id="capa-marco-elim-user" class="capa_marco_acciones_gral">
	<div class="capa_marco_sombra_gral"></div>
	<div class="capa_tabla_elim_user">
		<div class="capa_row_elim_user">
			<div id="capa-celda-dato-del" class="capa_celda_elim_user">Deseas eliminar a </div>
		</div>
		<div class="capa_row_elim_user">
			<div class="capa_celda_elim_user">
			<input type="hidden" id="uuid_del" name="uuid_del" value="">
			<button type="button" name="boton_accion_del" class="boton_accion_del">Si</button>
			&nbsp;&nbsp;&nbsp;
			<button type="button" name="boton_accion_del" class="boton_accion_del">No</button>
			</div>
		</div>
	</div>
</div>
<div id="capa-marco-reset-pwd" class="capa_marco_acciones_gral">
	<form id="form_reset_pwd" name="form_reset_pwd" method="post" action="">
	<input type="hidden" id="token_rst" name="token_rst" value="<?= $t ?>">
	<div class="capa_marco_sombra_gral"></div>
	<div class="capa_tabla_reset_pwd">
		<input type="hidden" id="uuid_rst" name="uuid_rst" value="">
		<div class="capa_row_modif_user_01">
			<div class="capa_celda_modif_user">Password Nueva: <input type="password" id="pass1_rst" name="pass1_rst" value=""></div>
		</div>
		<div class="capa_row_modif_user_01">
			<div class="capa_celda_modif_user">Rep. Password: <input type="password" id="pass2_rst" name="pass2_rst" value=""></div>
		</div>
		<div class="capa_row_modif_user_02" style=" ">
			<div class="capa_celda_modif_user">
			<button type="button" name="boton_accion_rst" style="width:100; cursor:pointer; ">Resetear</button>
			&nbsp;&nbsp;&nbsp;
			<button type="button" name="boton_accion_rst" style="width:100; cursor:pointer; ">Cancelar</button>
			</div>
		</div>
	</div>
	</form>
</div>
<div id="capa-marco-info-user" class="capa_marco_acciones_gral">
	<div class="capa_marco_sombra_gral"></div>
	<div id="capa-ajax-ver-info" style=""></div>
</div>
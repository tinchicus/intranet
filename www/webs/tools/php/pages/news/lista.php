<input type="hidden" id="codigo" value="">
<div id="capa-marco-lista">
	<div id="capa-boton-agregar">
		<button type="button" id="boton-agregar">Agregar novedades</button>
	</div>
	<div id="capa-lista-news">
	<div id="linea_titulo_01">
		<div class="capa_celda_titulo">Texto</div>
	</div>
	<div id="linea_titulo_02">
		<div class="capa_celda_titulo">Seccion</div>
	</div>
	<div id="linea_titulo_03">
		<div class="capa_celda_titulo">Fecha</div>
	</div>
	<div id="linea_titulo_04">
		<div class="capa_celda_titulo">Usuario</div>
	</div>
	<div id="linea_titulo_05">
		<div class="capa_celda_titulo">Acciones</div>
	</div>
	<?php foreach($lista as $l) { ?>
	<div id="linea_datos_01">
		<div class="capa_celda_datos"><?= strlen($l->texto) > 100 ? substr($l->texto,0,97) . "..." : $l->texto; ?></div>
	</div>
	<div id="linea_datos_02">
		<div class="capa_celda_datos"><?= $l->tipo; ?></div>
	</div>
	<div id="linea_datos_03">
		<div class="capa_celda_datos"><?= $l->fecha; ?></div>
	</div>
	<div id="linea_datos_04">
		<div class="capa_celda_datos"><?= $l->usuario; ?></div>
	</div>
	<div id="linea_datos_05">
		<div class="capa_celda_datos">
			<input type="hidden" id="codex" name="codex" value="<?= $l->codigo; ?>">
			<button name="boton_mod" type="button" class="boton_accion_nov" style="background-image:url(pics/tools.png); "></button>
			<button name="boton_ver" type="button" class="boton_accion_nov" style="background-image:url(pics/info.png); "></button>
			<button name="boton_elm" type="button" class="boton_accion_nov" style="background-image:url(pics/cerrarmhm.png); "></button>
		</div>
	</div>
	<?php } ?>
	</div>
</div>
<div id="capa-marco-ver-news" class="capa_marco_mostrar_accion">
	<div id="capa-marco-sombra-news" class="capa_sombra_accion"></div>
	<div id="capa-ajax-datos-news"></div>
</div>
<div id="capa-marco-eliminar" class="capa_marco_mostrar_accion">
	<div id="capa-sombra-elim" class="capa_sombra_accion"></div>
	<div id="capa-dialogo-elim" style="">
		<table class="tabla_dialogo_eliminar">
			<tr><td class="td_dialogo_eliminar_01">Deseas eliminar esta novedad ?</td></tr>
			<tr>
				<td class="td_dialogo_eliminar_02" style=" ">
				<button name="boton_accion_elim" type="button" class="boton_accion_elim">Si</button>&nbsp;&nbsp;&nbsp;<button name="boton_accion_elim" type="button" class="boton_accion_elim">No</button>
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>
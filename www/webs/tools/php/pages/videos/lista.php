<div class="capa_marco_videos_gral">
	<div class="capa_lista_filtros">
		<div class="capa_boton_filtro"><button type="button" name="boton_accion_lista" class="boton_filtro">Videos</button></div>
		<div class="capa_boton_filtro"><button type="button" name="boton_accion_lista" class="boton_filtro">Series</button></div>
		<div class="capa_boton_filtro"><button type="button" name="boton_accion_lista" class="boton_filtro">Sagas</button></div>
		<div class="capa_boton_filtro"><button type="button" name="boton_accion_lista" class="boton_filtro">Listas</button></div>
		<div class="capa_boton_filtro">
			<select id="nuevo" name="nuevo" style="width:95%; ">
				<option value="">Agregar nuevos</option>
				<option value="pelis">Videos</option>
				<option value="series">Series</option>
				<option value="sagas">Sagas</option>
				<option value="lista">Listas</option>
			</select>		
		</div>
	</div>
	<div class="capa_grilla_lista">
		<?php foreach($listado as $l) { ?>
		<div name="capa_video_datos_lista" class="capa_video_datos_lista">
			<div class="capa_tabla_datos_video" style="background-image:url(../../../videos/pics/<?= $l->foto; ?>); ">
				<div class="capa_row_datos_video">
					<div class="capa_celda_datos_video_01"></div>
				</div>
				<div class="capa_row_datos_video">
					<div name="celda_lista_video_datos" class="capa_celda_datos_video_02">
						<?= $l->titulo; ?><br>
						<input type="hidden" id="codex" name="codex" value="<?= $l->codigo; ?>">
						<input type="hidden" id="tipex" name="tipex" value="<?= $l->tipo; ?>">
						<button name="boton_mod" type="button" class="boton_accion_lista" style="background-image:url(pics/tools.png); "></button>
						<button name="boton_ver" type="button" class="boton_accion_lista" style="background-image:url(pics/info.png); "></button>
						<button name="boton_del" type="button" class="boton_accion_lista" style="background-image:url(pics/cerrarmhm.png); "></button>					
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<div id="capa-marco-eliminar-gral" class="capa_marco_acciones_gral">
	<div class="capa_marco_sombra_gral"></div>
	<div class="capa_tabla_dialogo_elim" style=" ">
		<div class="capa_row_dialogo_elim">
			<div id="td-elemento-id" class="capa_celda_dialogo_elim">Deseas eliminar a </div>
		</div>
		<div class="capa_row_dialogo_elim">
			<div class="capa_celda_dialogo_elim">
				<input type="hidden" id="codex_d" value="">
				<input type="hidden" id="tipex_d" value="">
				<button type="button" name="boton_elim_dato" class="boton_elim_dato">Si</button>&nbsp;&nbsp;&nbsp;<button type="button" name="boton_elim_dato" class="boton_elim_dato">No</button>
			</div>
		</div>
	</div>
</div>
<div id="capa-marco-ver-video" class="capa_marco_acciones_gral">
	<div class="capa_marco_sombra_gral"></div>
	<div id="capa-ajax-ver-contenido" class="capa_ajax_ver_cont"></div>
</div>
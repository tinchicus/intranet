<div id="capa-marco-lista-musica">
	<div id="capa-filtros-musica">
		<div class="capa_filtro_elegir"><button name="boton_filtro" type="button" class="boton_filtro">Solo discos</button></div>
		<div class="capa_filtro_elegir"><button name="boton_filtro" type="button" class="boton_filtro">Canciones sueltas</button></div>
		<div class="capa_filtro_elegir"><button name="boton_filtro" type="button" class="boton_filtro">Playlists</button></div>
		<div class="capa_filtro_nuevo">
			<div class="capa_boton_nuevo">
			<select id="nuevo" name="nuevo" style="width:70%; ">
				<option value="">Agregar</option>
				<option value="cancion">Cancion</option>
				<option value="disco">Disco</option>
				<option value="lista">Playlist</option>
			</select>
			</div>
		</div>
	</div>
	<div id="capa-lista-musica">
		<?php for($i=0; $i < count($listado); $i++) { ?>
			<div name="capa_datos_musica" class="capa_datos_musica">
				<input type="hidden" id="codex" name="codex" value="<?= $listado[$i]->id; ?>">
				<input type="hidden" id="tipex" name="tipex" value="<?= $listado[$i]->tipo; ?>">
				<div class="celda_dato_musica">
					<div class="bloque_dato_musica" style="background-image:url(../../../musica/pics/<?= $listado[$i]->foto ? $listado[$i]->foto : "fondo.jpg"; ?>); ">
						<table class="tabla_dato_musica">
							<tr><td style=" height:50%; ">&nbsp;</td></tr>
							<tr>
								<td name="td_acciones_musica" class="td_dato_musica">
								<?= $listado[$i]->artista != "tipo-pl" ? $listado[$i]->artista . " - " : ""; ?><?= $listado[$i]->titulo; ?><br>
								<button name="boton_musica_modif" type="button" class="boton_accion_musica" style="background-image:url(pics/tools.png); "></button>
								<button name="boton_musica_info" type="button" class="boton_accion_musica" style="background-image:url(pics/info.png);"></button>
								<button name="boton_musica_elim" type="button" class="boton_accion_musica" style="background-image:url(pics/cerrarmhm.png);"></button>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<div id="capa-marco-eliminar">
	<div class="capa_sombra_musica"></div>
	<div class="capa_dialogo_eliminar">
		<table class="tabla_eliminar_musica">
			<tr><td class="td_eliminar_01">Deseas eliminar a</td></tr>
			<tr><td id="td_titulo_elim" class="td_eliminar_02"></td></tr>
			<tr>
				<td class="td_eliminar_03">
				<input type="hidden" id="codigo" name="codigo" value="">
				<button name="boton_elim_musica" type="button" class="boton_eliminar">Si</button>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button name="boton_elim_musica" type="button" class="boton_eliminar">No</button>
				</td>
			</tr>
		</table>
	</div>
</div>
<div id="capa-marco-ver-musica">
	<div class="capa_sombra_musica"></div>
	<div id="capa-marco-ajax-musica" style=" "></div>
</div>
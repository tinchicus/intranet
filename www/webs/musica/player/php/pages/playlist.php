<div id="capa-marco-add-playlist" class="capa_marco_add_playlist">
	<div class="capa_sombra_add_playlist"></div>
	<div class="capa_dialogo_add_playlist">
		<div class="tabla_dialogo_add_playlist">
			<div class="row_dialogo_add_playlist_01">
				<div class="celda_dialogo_add_playlist">
					Elige la playlist donde agregarla:<br>
					<select id="play_lists">
						<option value="">--</option>
						<?php foreach($playlists as $pl) { ?>
						<option value="<?= $pl->codigo; ?>"><?= $pl->titulo; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row_dialogo_add_playlist_02">
				<div class="celda_dialogo_add_playlist">
					<button type="button" name="boton_control_pl_player" class="boton_control_pl_player">Agregar</button>
					&nbsp;&nbsp;&nbsp;
					<button type="button" name="boton_control_pl_player" class="boton_control_pl_player">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
</div>
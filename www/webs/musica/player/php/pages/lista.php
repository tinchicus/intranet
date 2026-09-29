<div id="capa-marco-lista-player" class="capa_marco_lista_musica">
	<input type="hidden" id="actual" value="<?= $actual; ?>">
	<div class="capa_tabla_lista_musica">
		<?php foreach($lista as $l) { ?>
		<div class="capa_row_lista_musica">
			<div name="celda_lista_player" class="capa_celda_lista_musica">
				<button type="button" name="boton_lista_player" class="boton_lista_musica" style="background-image:url(../../../musica/pics/<?= $l->foto ? $l->foto : "fondo.jpg"; ?>);   ">
					<div class="boton_tabla_lista_musica">
						<div class="boton_celda_lista_musica">
							<?= $l->artista; ?><br>
							<?= $l->titulo; ?>
							<input type="hidden" name="codigo_lst" value="<?= $l->codigo; ?>">
							<input type="hidden" name="tipo_lst" value="<?= $l->tipo; ?>">
							<input type="hidden" name="track_lst" value="<?= $l->track; ?>">
						</div>
					</div>
				</button>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
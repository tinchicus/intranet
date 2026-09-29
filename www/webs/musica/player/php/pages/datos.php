<div class="capa_marco_datos_musica">
	<input type="hidden" id="cod-ant" value="<?= $anterior->codigo; ?>">
	<input type="hidden" id="tip-ant" value="<?= $anterior->tipo; ?>">
	<input type="hidden" id="cod-prx" value="<?= $proximo->codigo; ?>">
	<input type="hidden" id="tip-prx" value="<?= $proximo->tipo; ?>">
	<input type="hidden" id="tip-act" value="<?= $sesion->tipo; ?>">
	<input type="hidden" id="trk-act" value="<?= $cancion->track; ?>">
	<div class="capa_fondo_imagen_musica" style="background-image:url(../../../musica/pics/<?= $cancion->foto ? $cancion->foto : "fondo.jpg"; ?>);"></div>
	<?php if ($sesion->tipo=="ar" || $sesion->tipo=="pl") { ?>
	<div class="capa_cont_datos_musica_01">
	<div class="capa_tabla_datos_musica">
		<div class="capa_row_datos_musica_01">
			<div class="capa_celda_datos_musica">
				<img src="../../../musica/pics/<?= $cancion->foto ? $cancion->foto : "fondo.jpg"; ?>" class="capa_imagen_datos_musica">
			</div>
		</div>
		<div class="capa_row_datos_musica_02">
			<div class="capa_celda_datos_musica">
			<span class="texto_span_musica"><?= $cancion->artista; ?> - <?= $cancion->titulo; ?></span><br>
			<span class="texto_span_musica"><?= $cancion->disco; ?></span><br>
			<span class="texto_span_musica"><?= $cancion->genero; ?> / <?= $cancion->ano; ?> / <?= $cancion->pais; ?></span><br>
			</div>		
		</div>
	</div>
	</div>
	<?php } ?>
	<?php if($sesion->tipo=="al") { ?>
	<div class="capa_datos_disco_player">
	<div class="tabla_datos_disco_player">
		<div class="row_datos_disco_player">
			<div class="celda_datos_disco_player_01">
				<div class="capa_tabla_datos_disco">
					<div class="capa_row_datos_disco_01">
						<div class="capa_celda_datos_disco">
							<img src="../../../musica/pics/<?= $disco->foto ? $disco->foto : "fondo.jpg"; ?>" class="img_disco_dato">
						</div>
					</div>
					<div class="capa_row_datos_disco_02">
						<div class="capa_celda_datos_disco">
							<span class="texto_span_musica"><?= $disco->genero; ?></span><br>
							<span class="texto_span_musica"><?= $disco->artista; ?></span><br>
							<span class="texto_span_musica"><?= $disco->titulo; ?></span><br>
							<span class="texto_span_musica"><?= $disco->pais; ?> / <?= $disco->ano; ?></span><br><br>
							<span id="cancion-playing" class="texto_span_musica">Reproduciendo:<br><?= $disco->artista=="Varios" ? $cancion->artista . " - " : ""; ?><?= $cancion->titulo; ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="celda_datos_disco_player_02">
				<input type="hidden" id="disco-loop" value="0">
				<div class="capa_marco_canciones_disco">
					<div class="capa_lista_canciones_disco">
						<div class="tabla_lista_canciones_disco">
							<?php foreach($lista_disco as $ld) { ?>
							<div class="row_lista_canciones_disco">
								<div class="celda_lista_canciones_disco">
									<button type="button" name="boton_cancion_disco" class="boton_cancion_disco"><?= $disco->artista=="Varios" ? $ld->artista . " - " : ""; ?><?= $ld->titulo; ?></button>
									<input type="hidden" name="archivo_disco" value="<?= $ld->archivo; ?>">
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php } ?>
</div>
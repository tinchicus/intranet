<div class="capa_marco_datos_serie" style=" background-image:url(../../videos/pics/<?= $datos->foto; ?>);  ">
	<div class="capa_tabla_datos_serie">
		<div class="capa_celda_datos_serie">
		<?= $sesion->tipo; ?><br>
		<?= $datos->titulo; ?><br>
		<?= $datos->seccion; ?> / <?= $datos->categoria; ?><br>
		&quot;<?= $datos->texto; ?>&quot;
		<input type="hidden" id="codigo_ser" value="<?= $sesion->codigo; ?>">
		<input type="hidden" id="tipo_ser" value="<?= $sesion->tipo; ?>">
		</div>
	</div>
</div>
<div class="capa_marco_lista_serie">
	<?php foreach($listas as $l) { ?>
	<div name="capa_cont_lista_serie" class="capa_cont_lista_serie">
		<div class="capa_datos_lista_serie" style="background-image:url(../../videos/pics/<?= $l->foto ? $l->foto : "foto01.jpeg"; ?>); ">
			<div class="capa_tabla_lista_serie">
				<div class="capa_row_lista_serie">
					<div class="capa_celda_lista_serie_01">
					<?= $l->seccion; ?><br>
					<?= $l->titulo; ?><br>
					<?= $l->director; ?><br>
					<?= $l->idioma; ?> / Subs: <?= $l->subtitulo; ?><br>
					<?= $l->pais; ?>
					<input type="hidden" name="track_lst" value="<?= $l->track; ?>">
					</div>
					<div class="capa_celda_lista_serie_02">
					<?= $l->texto; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
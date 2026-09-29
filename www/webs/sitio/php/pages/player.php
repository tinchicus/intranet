<div class="capa_marco_player_sitio">
	<div class="capa_lista_player_sitio">
		<div id="capa-cont-tabla-lista" class="capa_cont_tabla_lista">
			<div class="tabla_lista_player_sitio">
				<?php foreach($listas as $l) { ?>
				<div name="row_tabla" class="row_lista_player_sitio" style="background-image:url(../../musica/pics/<?= $l->foto ? $l->foto : "fondo.jpg"; ?>);  ">
					<div class="celda_lista_player_sitio">
						<span class="texto_lista_player_sitio"><?= $l->artista;?></span><br>
						<span class="texto_lista_player_sitio"><?= $l->titulo;?></span>
						<input type="hidden" name="codigo_lst" value="<?= $l->codex; ?>">
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="capa_boton_arriba_lista">
			<button type="button" name="boton_lista_player" class="boton_lista_player"><img src="pics/arriba.png" style="height:95%; border:0; "></button>
		</div>
		<div class="capa_boton_abajo_lista">
			<button type="button" name="boton_lista_player" class="boton_lista_player"><img src="pics/abajo.png" style="height:95%; border:0; "></button>
		</div>
	</div>
	<div id="capa-ajax-player" class="capa_ajax_player"></div>
</div>
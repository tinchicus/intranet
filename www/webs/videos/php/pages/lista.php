<div id="capa-marco-ultimo-video" class="capa_marco_ultimo_video">
	<?php if (count($listas) > 0) { ?>
	<video id="vhs" src="../../videos/<?= $listas[0]->codex . ".mp4"; ?>" poster="../../videos/pics/<?= $listas[0]->foto; ?>" ></video>
	<div class="capa_tabla_ultimo_video">
		<div class="capa_celda_ultimo_video">
			<?= $listas[0]->tipo; ?><br>
			<?= $listas[0]->titulo; ?><br>
			<?= $listas[0]->seccion; ?> / <?= $listas[0]->categoria; ?><br>
			<?= $listas[0]->texto; ?>
			<input type="hidden" id="codigo_ult" value="<?= $listas[0]->codex; ?>">
			<input type="hidden" id="tipo_ult" value="<?= $listas[0]->tipo; ?>">
		</div>
	</div>
	<?php } ?>
</div>
<div class="capa_marco_lista_videos">
	<div class="capa_grilla_lista_videos">
		<?php for($i=1, $j=0; $i < count($listas); $i++, $j++) { ?>
		<div name="capa_cont_lista_videos" class="capa_cont_lista_videos">
			<div class="capa_tabla_lista_videos" style="background-image:url(../../videos/pics/<?= $listas[$i]->foto ? $listas[$i]->foto : "foto01.jpeg"; ?>); ">
				<div class="capa_row_lista_videos_01"><div class="capa_celda_lista_videos_01"></div></div>
				<div class="capa_row_lista_videos_02">
					<div class="capa_celda_lista_videos_02">
						<?= $listas[$i]->tipo; ?><br>
						<?= $listas[$i]->titulo; ?><br>
						<?= $listas[$i]->categoria; ?>
						<input type="hidden" name="codigo_lst" value="<?= $listas[$i]->codex; ?>">
						<input type="hidden" name="tipo_lst" value="<?= $listas[$i]->tipo; ?>">
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>



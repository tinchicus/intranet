<div id="capa-marco-filtro-videos" class="capa_marco_filtro_videos">
	<div class="capa_lista_botones_filtro">
		<div class="capa_grilla_botones_filtro">
			<button type="button" name="boton_filtro_videos" class="boton_filtro_videos">Solo Listas</button>
			<button type="button" name="boton_filtro_videos" class="boton_filtro_videos">Solo Sagas</button>
			<button type="button" name="boton_filtro_videos" class="boton_filtro_videos">Solo Series</button>
			<button type="button" name="boton_filtro_videos" class="boton_filtro_videos">Solo Videos</button>
			<button type="button" name="boton_filtro_videos" class="boton_filtro_videos">Por Seccion</button>
			<button type="button" name="boton_filtro_videos" class="boton_filtro_videos">Por Pais</button>
			<button type="button" name="boton_filtro_videos" class="boton_filtro_videos">Por A&ntilde;o</button>
			<button type="button" name="boton_filtro_videos" class="boton_filtro_videos">Por Estudio</button>
			<button type="button" name="boton_filtro_videos" class="boton_filtro_videos">Por Categoria</button>
		</div>
	</div>
	<div class="capa_lista_filtro2_videos">
		<div name="capa_filtro2_videos" class="capa_grilla_filtro2_videos">
			<?php foreach($seccion_flt as $s) { ?>
				<button type="button" name="boton_filtro2_seccion_videos" class="boton_filtro2_gral_videos"><?= $s->seccion; ?></button>
			<?php } ?>
		</div>
		<div name="capa_filtro2_videos" class="capa_grilla_filtro2_videos">
			<?php foreach($pais_flt as $p) { ?>
				<button type="button" name="boton_filtro2_pais_videos" class="boton_filtro2_gral_videos"><?= $p->pais; ?></button>
			<?php } ?>
		</div>
		<div name="capa_filtro2_videos" class="capa_grilla_filtro2_videos">
			<?php foreach($ano_flt as $a) { ?>
				<button type="button" name="boton_filtro2_ano_videos" class="boton_filtro2_gral_videos"><?= $a->ano; ?></button>
			<?php } ?>
		</div>
		<div name="capa_filtro2_videos" class="capa_grilla_filtro2_videos">
			<?php foreach($est_flt as $e) { ?>
				<button type="button" name="boton_filtro2_estudio_videos" class="boton_filtro2_gral_videos"><?= $e->estudio; ?></button>
			<?php } ?>
		</div>
		<div name="capa_filtro2_videos" class="capa_grilla_filtro2_videos">
			<?php foreach($cat_flt as $c) { ?>
				<button type="button" name="boton_filtro2_categ_videos" class="boton_filtro2_gral_videos"><?= $c->titulo; ?></button>
				<input type="hidden" name="filtro2_vlr" value="<?= $c->valor; ?>">
			<?php } ?>
		</div>
	</div>
</div>
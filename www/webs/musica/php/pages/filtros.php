<div id="capa-marco-filtros-musica" class="capa_marco_filtros_musica">
	<div class="capa_grilla_boton_filtro1">
		<button type="button" name="boton_filtro_musica" class="boton_filtro_musica">Solo Listas</button>
		<button type="button" name="boton_filtro_musica" class="boton_filtro_musica">Solo Discos</button>
		<button type="button" name="boton_filtro_musica" class="boton_filtro_musica">Solo Canciones</button>
		<button type="button" name="boton_filtro_musica" class="boton_filtro_musica">Por genero</button>
		<button type="button" name="boton_filtro_musica" class="boton_filtro_musica">Por artista</button>
		<button type="button" name="boton_filtro_musica" class="boton_filtro_musica">Por pais</button>
		<button type="button" name="boton_filtro_musica" class="boton_filtro_musica">Por a&ntilde;o</button>
	</div>
	<div class="capa_lista_filtro2_musica">
		<div name="capa_filtro2_musica" class="capa_grilla_filtro2_musica">
			<?php foreach($generos as $g) { ?>
			<button type="button" name="boton_filtro_genero" class="boton_gral_filtro2_musica"><?= $g->filtro1; ?></button>
			<?php } ?>
		</div>		
		<div name="capa_filtro2_musica" class="capa_grilla_filtro2_musica">
			<?php foreach($artistas as $a) { ?>
			<button type="button" name="boton_filtro_artista" class="boton_gral_filtro2_musica"><?= $a->filtro1; ?></button>
			<?php } ?>		
		</div>
		<div name="capa_filtro2_musica" class="capa_grilla_filtro2_musica">
			<?php foreach($paises as $p) { ?>
			<button type="button" name="boton_filtro_pais" class="boton_gral_filtro2_musica"><?= $p->filtro1; ?></button>
			<?php } ?>		
		</div>
		<div name="capa_filtro2_musica" class="capa_grilla_filtro2_musica">
			<?php foreach($anos as $y) { ?>
			<button type="button" name="boton_filtro_ano" class="boton_gral_filtro2_musica"><?= $y->filtro1; ?></button>
			<?php } ?>		
		</div>
	</div>
</div>
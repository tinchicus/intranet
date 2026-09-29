<?php for($i = 0; $i < count($frases); $i++) { ?>
<div name="capa_marco_frases_sitio" class="capa_marco_frases_sitio" style="opacity:<?= $i == 0 ? "1" : "0"; ?>;  ">
	<div class="capa_imagen_autor_frase" style="background-image:url(../frases/<?= $frases[$i]->foto ? $frases[$i]->foto : "fondo.png"; ?>); "></div>
	<div class="capa_tabla_texto_frase">
		<div class="capa_row_texto_frase">
			<div class="capa_celda_texto_frase">
				<?= $frases[$i]->texto; ?>
			</div>
		</div>
		<div class="capa_row_autor_frase">
			<div class="capa_celda_autor_frase">
				~<?= $frases[$i]->autor; ?>			
			</div>
		</div>
	</div>
</div>
<?php } ?>
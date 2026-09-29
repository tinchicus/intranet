<div class="capa_marco_trio_sitio">
	<div id="capa-musica" class="capa_cont_musica_sitio" style="background-image:url(../../musica/pics/<?= $musica->foto ? $musica->foto : "fondo.jpg"; ?>);  ">
		<div class="capa_tabla_musica_sitio">
			<div class="capa_celda_musica_sitio">M&uacute;sica</div>
		</div>
	</div>
	<div class="capa_cont_news_sitio">
		<div class="capa_titulo_news_sitio">
			<div class="capa_celda_news_sitio">Novedades</div>
		</div>
		<div class="capa_ultimo_news_sitio">
			<?= $nov_site[0]->fecha; ?> - <?= $nov_site[0]->texto; ?>
		</div>
		<div class="capa_boton_news_sitio">
			<div class="capa_celda_boton_news">
			<button id="boton-mas-news" type="button" class="boton_mostrar_news_sitio">Mas Novedaes</button>
			</div>
		</div>
	</div>
	<div id="capa-tools" class="capa_cont_tools_sitio">
		<div class="capa_tabla_tools_sitio">
			<div class="capa_celda_tools_sitio">Tools</div>
		</div>
	</div>
</div>
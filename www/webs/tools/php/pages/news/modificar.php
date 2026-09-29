<form id="form-mod-news" name="form-mod-news" method="post" action="php/datos/news/modificar.php">
<input type="hidden" id="token" name="token" value="<?= $t; ?>">
<input type="hidden" id="codigo" name="codigo" value="<?= $novedad->codigo; ?>">
<div id="capa-marco-modificar-news">
	<div class="capa_tabla_modif_01">
		<div class="td_tabla_modif_01">Novedades de:</div>
		<div class="td_tabla_modif_02">
			<select id="tipo" name="tipo">
				<option value="">--</option>
				<option value="Sitio" <?= $novedad->tipo == "Sitio" ? "selected" : ""; ?>>Sitio</option>
				<option value="Musica" <?= $novedad->tipo == "Musica" ? "selected" : ""; ?>>Musica</option>
				<option value="Videos" <?= $novedad->tipo == "Videos" ? "selected" : ""; ?>>Videos</option>
			</select>
		</div>
	</div>
	<div class="capa_tabla_modif_02">
		<div class="td_tabla_modif_03">Texto:</div>
		<div class="td_tabla_modif_04">
			<textarea id="texto" name="texto" class="zona_de_texto"><?= $novedad->texto; ?></textarea>
		</div>
	</div>
	<div class="capa_tabla_modif_01">
		<div class="td_tabla_botones">
			<button name="boton_accion_mod" type="button" class="boton_accion_mod">Modificar</button>
		</div>
		<div class="td_tabla_botones">
			<button name="boton_accion_mod" type="button" class="boton_accion_mod">Cancelar</button>
		</div>
	</div>
</div>
</form>
<form id="form-add-news" name="form-add-news" method="post" action="php/datos/news/agregar.php">
<input type="hidden" id="token" name="token" value="<?= $t; ?>">
<div id="capa-marco-agregar-news">
	<div class="capa_tabla_add_01">
		<div class="td_tabla_add_01">Novedades de:</div>
		<div class="td_tabla_add_02">
			<select id="tipo" name="tipo">
				<option value="">--</option>
				<option value="Sitio">Sitio</option>
				<option value="Musica">Musica</option>
				<option value="Videos">Videos</option>
			</select>
		</div>
	</div>
	<div class="capa_tabla_add_02">
		<div class="td_tabla_add_03">Texto:</div>
		<div class="td_tabla_add_04">
			<textarea id="texto" name="texto" class="zona_de_texto"></textarea>
		</div>
	</div>
	<div class="capa_tabla_add_01">
		<div class="td_tabla_botones">
			<button name="boton_accion_add" type="button" class="boton_accion_mod">Agregar</button>
		</div>
		<div class="td_tabla_botones">
			<button name="boton_accion_add" type="button" class="boton_accion_mod">Cancelar</button>
		</div>
	</div>	
</div>
</form>
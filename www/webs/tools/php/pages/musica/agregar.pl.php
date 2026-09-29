<form id="form_add_lista" name="form_add_lista" method="post" action="" enctype="multipart/form-data">
<div class="capa_marco_lista">
	<input type="hidden" id="token" name="token" value="<?= $t; ?>">
	<input type="hidden" id="archivo-lista" name="archivo-lista" value="">
	<div class="capa_linea_datos_lista">
		<table class="tabla_linea_datos_lista">
			<tr>
				<td class="td_linea_datos_lista_01">Titulo:</td>
				<td class="td_linea_datos_lista_02"><input type="text" id="titulo" name="titulo" value="<?= $titulo; ?>" style="width:70%; "></td>
			</tr>
		</table>
	</div>
	<div class="capa_linea_datos_lista">
		<table class="tabla_linea_datos_lista">
			<tr>
				<td class="td_linea_datos_lista_01">Genero</td>
				<td class="td_linea_datos_lista_02">
					<select id="genero" name="genero">
						<option value="">--</option>
						<option value="Varios" <?= $genero == "Varios" ? "selected" : ""; ?>>Varios</option>
						<?php foreach($generos_pl as $g) { ?>
						<option value="<?= $g->genero ?>" <?= $g->genero == $genero ? "selected" : ""; ?>><?= $g->genero; ?></option>
						<?php } ?>
					</select>				
				</td>
			</tr>
		</table>
	</div>
	<div class="capa_linea_datos_lista">
		<table class="tabla_linea_datos_lista">
			<tr>
				<td class="td_linea_datos_lista_01">Tipo:</td>
				<td class="td_linea_datos_lista_02">
					<select id="tipo" name="tipo">
						<option value="">--</option>
						<option value="publico" <?= $tipo == "publico" ? "selected" : ""; ?>>Publico</option>
					</select>
				</td>
			</tr>
		</table>
	</div>
	<div class="capa_linea_datos_lista">
		<table class="tabla_linea_datos_lista">
			<tr>
				<td class="td_linea_datos_lista_01">Foto:</td>
				<td class="td_linea_datos_lista_02"><input type="file" id="foto" name="foto" value=""></td>
			</tr>
		</table>
	</div>	
	<div class="capa_linea_datos_lista">
		<table class="tabla_linea_datos_lista">
			<tr>
				<td class="td_linea_datos_lista_03">
					<button name="boton_accion_lista" type="button" style="width:100; cursor:pointer; ">Subir</button>
				</td>
				<td class="td_linea_datos_lista_03">
					<button name="boton_accion_lista" type="button" style="width:100; cursor:pointer; ">Cancelar</button>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="capa_marco_canciones_lista">
	<div class="capa_linea_datos_lista"></div>
	<div class="capa_listado_canciones_lista">
	<?php foreach($listado_pl as $l) { ?>
	<input type="hidden" id="archivo_lst" name="archivo_lst" value="<?= $l->archivo; ?>">
	<button name="boton_lista_agregar" type="button" class="boton_lista_agregar">
	<?= $l->artista; ?> - <?= $l->titulo; ?>
	</button>
	<?php } ?>
	</div>
	<div id="capa-marco-lista-pl" class="capa_marco_pl_lista">
		<div id="capa-texto-lista-pl" class="capa_texto_lista_pl">
		Canciones Agregadas:<br>
		</div>
	</div>
</div>
</form>
<form id="form_mod_lista" name="form_mod_lista" method="post" action="" enctype="multipart/form-data">
<input type="hidden" id="token" name="token" value="<?= $t; ?>">
<input type="hidden" id="codigo" name="codigo" value="<?= $sesion->id; ?>">
<div class="capa_marco_lista">
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
						<option value="privado" <?= $tipo == "privado" ? "selected" : ""; ?>>Privado</option>
						<option value="publico" <?= $tipo == "publico" ? "selected" : ""; ?>>Publico</option>
					</select>
				</td>
			</tr>
		</table>
	</div>
	<div class="capa_linea_fotos_lista" style=" ">
		<table class="tabla_linea_datos_lista">
			<tr>
				<td class="td_linea_datos_lista_01">Foto:</td>
				<td class="td_linea_datos_lista_02">
					<img id="img-pl-act" src="../../../musica/pics/<?= $foto_p; ?>" style="" align="absmiddle">
					<input type="hidden" id="foto_p" name="foto_p" value="<?= $foto_p; ?>"> 
					<input type="file" id="foto" name="foto" value="">
				</td>
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
	<div class="capa_marco_cancioone_modif">
		<div class="capa_canciones_pl">
		<?php for($i=0; $i < count($track_lst); $i++) { 
			$omitir = explode(";",$track_lst[$i]);
			?>
			<div class="tabla_canciones_pl">
				<input type="hidden" id="track_lst" name="track_lst[]" value="<?= $track_lst[$i]; ?>">
				<input type="hidden" id="track_dat" name="track_dat[]" value="<?= $track_dat[$i]; ?>">
				<div class="celda_boton_canciones_pl">
					<button name="boton_omitir_cancion" type="button" class="boton_omitir_cancion" style=" "><?= $omitir[1] == "si" ? "+" : "-"; ?></button>
				</div>
				<div name="celda_datos_lista" class="celda_datos_canciones_pl" style=" opacity:<?= $omitir[1] == "si" ? "0.2" : "1.0"; ?>; "><?= $track_dat[$i]; ?></div>
			</div>
		<?php } ?>
		</div>
		<div class="capa_marco_listado_canciones">
			<div class="capa_linea_datos_lista"></div>
			<div class="capa_lista_canciones_dispo">
			<?php foreach($listado as $l) { ?>
			<input type="hidden" id="lista_dispo" name="lista_dispo" value="<?= $l->archivo; ?>">
			<button name="boton_cancion_dispo" class="boton_lista_agregar"><?= $l->artista . " - " . $l->titulo; ?></button>
			<?php } ?>
			</div>
		</div>
	</div>
</form>
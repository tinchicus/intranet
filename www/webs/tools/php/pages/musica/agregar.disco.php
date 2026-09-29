<form id="form_add_disc" name="form_add_disc" method="post" action="" enctype="multipart/form-data">
<input type="hidden" id="token" name="token" value="<?= $t; ?>">
<input type="hidden" id="cantidad" name="cantidad" value="<?= $cantidad; ?>">
<div class="capa_marco_disco">
	<div class="capa_linea_datos_disco">
		<table class="tabla_linea_datos_disco">
			<tr>
				<td class="td_linea_datos_disco_01">Artista:</td>
				<td class="td_linea_datos_disco_02">
					<select id="artista" name="artista">
						<option value="">--</option>
						<option value="nuevo" <?= $artista == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
						<option value="Varios" <?= $artista == "Varios" ? "selected" : ""; ?>>Varios</option>
						<?php foreach($artistas as $a) { ?>
						<option value="<?= $a->artista; ?>" <?= $a->artista == $artista ? "selected" : ""; ?>><?= $a->artista; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
		</table>
	</div>
	<?php if ($artista == "nuevo") { ?>
	<div class="capa_linea_datos_disco">
		<table class="tabla_linea_datos_disco">
			<tr>
				<td class="td_linea_datos_disco_01">Artista:</td>
				<td class="td_linea_datos_disco_02"><input type="text" id="artista2" name="artista2" value="<?= $artista2; ?>" style="width:70%; "></td>
			</tr>
		</table>
	</div>
	<?php } ?>
	<div class="capa_linea_datos_disco">
		<table class="tabla_linea_datos_disco">
			<tr>
				<td class="td_linea_datos_disco_01">Titulo:</td>
				<td class="td_linea_datos_disco_02"><input type="text" id="titulo" name="titulo" value="<?= $titulo; ?>" style="width:70%; "></td>
			</tr>
		</table>
	</div>
	<div class="capa_linea_datos_disco">
		<table class="tabla_linea_datos_disco">
			<tr>
				<td class="td_linea_datos_disco_01">Genero:</td>
				<td class="td_linea_datos_disco_02">
					<select id="genero" name="genero">
						<option value="">--</option>
						<option value="nuevo" <?= $genero == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
						<?php foreach($generos as $g) { ?>
						<option value="<?= $g->genero ?>" <?= $g->genero == $genero ? "selected" : ""; ?>><?= $g->genero; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
		</table>
	</div>
	<?php if ($genero == "nuevo") { ?>
	<div class="capa_linea_datos_disco">
		<table class="tabla_linea_datos_disco">
			<tr>
				<td class="td_linea_datos_disco_01">Genero:</td>
				<td class="td_linea_datos_disco_02"><input type="text" id="genero2" name="genero2" value="<?= $genero2; ?>" style="width:70%; "></td>
			</tr>
		</table>
	</div>
	<?php } ?>
	<div class="capa_linea_datos_disco">
		<table class="tabla_linea_datos_disco">
			<tr>
				<td class="td_linea_datos_disco_01">Pais:</td>
				<td class="td_linea_datos_disco_02">
					<select id="pais" name="pais">
						<?php if ($artista=="nuevo" || $artista == "Varios") { ?>
						<option value="">--</option>
						<option value="nuevo" <?= $pais == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
						<?php } ?>
						<?php foreach($paises as $p) { ?>
						<option value="<?= $p->pais ?>" <?= $p->pais == $pais ? "selected" : ""; ?>><?= $p->pais; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
		</table>
	</div>
	<?php if ($pais == "nuevo") { ?>
	<div class="capa_linea_datos_disco">
		<table class="tabla_linea_datos_disco">
			<tr>
				<td class="td_linea_datos_disco_01">Pais:</td>
				<td class="td_linea_datos_disco_02"><input type="text" id="pais2" name="pais2" value="<?= $pais2; ?>" style="width:70%; "></td>
			</tr>
		</table>
	</div>
	<?php } ?>
	<div class="capa_linea_datos_disco">
		<table class="tabla_linea_datos_disco">
			<tr>
				<td class="td_linea_datos_disco_01">A&ntilde;o:</td>
				<td class="td_linea_datos_disco_02">
				<select id="ano" name="ano">
				<?php for($i=date('Y'); $i > 1700; $i--) { ?>
				<option value="<?= $i; ?>" <?= $i == $ano ? "selected" : ""; ?>><?= $i; ?></option>			
				<?php } ?>
				</select>
				</td>
			</tr>
		</table>
	</div>
	<div class="capa_linea_datos_disco">
		<table class="tabla_linea_datos_disco">
			<tr>
				<td class="td_linea_datos_disco_01">Foto:</td>
				<td class="td_linea_datos_disco_02"><input type="file" id="foto" name="foto" value=""></td>
			</tr>
		</table>
	</div>
	<div class="capa_linea_datos_disco">
		<table class="tabla_linea_datos_disco">
			<tr>
				<td class="td_linea_datos_disco_03">
					<button name="boton_accion_disco" type="button" style="cursor:pointer; ">Subir</button>
				</td>
				<td class="td_linea_datos_disco_03">
					<button name="boton_accion_disco" type="button" style="cursor:pointer; ">Cancelar</button>
				</td>
			</tr>
		</table>
	</div>
	<div class="capa_ingreso_celdas">
		<div class="celda_ingreso_celdas">
			Cantidad de lineas a agregar:
			<input type="text" id="lineas-tabla" value="" size="1">
			<button id="agregar-lineas-disco" type="button" style="cursor:pointer; ">!</button>
		</div>
	</div>
	<div class="capa_marco_canciones_disco">
	<?php if ($artista != "Varios") { ?>
		<div class="capa_lista_canciones_disco">
			<div class="capa_etiqueta_lista_disco">
				<div class="celda_etiqueta_lista_disco">Titulo</div>
			</div>
			<div class="capa_etiqueta_lista_disco">
				<div class="celda_etiqueta_lista_disco">Archivo</div>
			</div>
			<?php for($i=0, $j=1; $i < $cantidad; $i++, $j++) { ?>
			<div class="capa_linea_cancion_disco"><?= $j < 10 ? "0" . $j . ". " : $j . ". "; ?><input type="text" id="titulo_cnc" name="titulo_cnc[]" placeholder="Ingresa el titulo" value="<?= $titulo_cnc[$i]; ?>"></div>
			<div class="capa_linea_cancion_disco"><input type="file" id="archivo_cnc" name="archivo_cnc[]" value=""></div>
			<?php } ?>
		</div>
	<?php } else {?>
		<div class="capa_lista_canciones_varios">
			<div class="capa_etiqueta_lista_disco">
				<div style="display:table-cell; color:#FFFFFF; font-size:1.5em; text-align:center; vertical-align:middle;  ">Artista</div>
			</div>
			<div class="capa_etiqueta_lista_disco">
				<div class="celda_etiqueta_lista_disco">Titulo</div>
			</div>
			<div class="capa_etiqueta_lista_disco">
				<div class="celda_etiqueta_lista_disco">Archivo</div>
			</div>
			<?php for($i=0, $j=1; $i < $cantidad; $i++, $j++) { ?>
			<div class="capa_linea_cancion_disco"><?= $j < 10 ? "0" . $j . ". " : $j . ". "; ?><input type="text" id="artista_cnc" name="artista_cnc[]" placeholder="Ingresa al artista" value="<?= $artista_cnc[$i]; ?>"></div>
			<div class="capa_linea_cancion_disco"><input type="text" id="titulo_cnc" name="titulo_cnc[]" placeholder="Ingresa el titulo" value="<?= $titulo_cnc[$i]; ?>"></div>
			<div class="capa_linea_cancion_disco"><input type="file" id="archivo_cnc" name="archivo_cnc[]" value=""></div>
			<?php } ?>
		</div>
	<?php } ?>
	</div>
</div>
</form>
<div id="capa-carga-musica">
	<div id="capa-sombra-carga"></div>
	<div id="capa-gif-carga">
		<img src="pics/03-05-45-320_512.gif" height="100%" border="0">
	</div>
</div>
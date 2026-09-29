<div class="capa_marco_cancion">
	<form id="form_add_cancion" name="form_add_cancion" method="post" action="" enctype="multipart/form-data">
	<input type="hidden" id="token" name="token" value="<?= $t; ?>">
	<input type="hidden" id="final" name="final" value="">
	<div class="capa_linea_datos">
	<table class="tabla_linea_datos">
		<tr>
			<td class="td_linea_01">Artista:</td>
			<td class="td_linea_02">
				<select id="artista" name="artista">
					<option value="">--</option>
					<option value="nuevo" <?= $artista == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
					<?php for($i=0; $i < count($artistas); $i++ ) { ?>
					<option value="<?= $artistas[$i]->artista; ?>" <?= $artistas[$i]->artista == $artista ? "selected" : ""; ?>><?= $artistas[$i]->artista; ?></option>					
					<?php } ?>
				</select>
			</td>
		</tr>
	</table>
	</div>
	<?php if ($artista == "nuevo") { ?>
	<div class="capa_linea_datos">
	<table class="tabla_linea_datos">
		<tr>
			<td class="td_linea_01">Artista:</td>
			<td class="td_linea_02"><input type="text" id="artista2" name="artista2" style="width:70%; " value="<?= $artista2; ?>"></td>
		</tr>
	</table>
	</div>
	<?php } ?>
	<div class="capa_linea_datos">
	<table class="tabla_linea_datos">
		<tr>
			<td class="td_linea_01">Titulo:</td>
			<td class="td_linea_02"><input type="text" id="titulo" name="titulo" style="width:70%; " value="<?= $titulo; ?>"></td>
		</tr>
	</table>
	</div>
	<div class="capa_linea_datos">
	<table class="tabla_linea_datos">
		<tr>
			<td class="td_linea_01">Album:</td>
			<td class="td_linea_02">
				<select id="album" name="album">
					<option value="">--</option>
					<option value="nuevo" <?= $album == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
					<?php for($i=0; $i < count($albums); $i++ ) { ?>
					<option value="<?= $albums[$i]->id_disco; ?>" <?= $albums[$i]->id_disco == $album ? "selected" : ""; ?>><?= $albums[$i]->tit_disco; ?></option>					
					<?php } ?>
				</select>
			</td>
		</tr>
	</table>
	</div>
	<?php if ($album == "nuevo") { ?>
	<div class="capa_linea_datos">
	<table class="tabla_linea_datos">
		<tr>
			<td class="td_linea_01">Album:</td>
			<td class="td_linea_02"><input type="text" id="album2" name="album2" style="width:70%; " value="<?= $album2; ?>"></td>
		</tr>
	</table>
	</div>
	<?php } ?>
	<div class="capa_linea_datos">
	<table class="tabla_linea_datos">
		<tr>
			<td class="td_linea_01">Genero:</td>
			<td class="td_linea_02">
				<select id="genero" name="genero">
					<option value="">--</option>
					<option value="nuevo" <?= $genero == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
					<?php for($i=0; $i < count($generos); $i++ ) { ?>
					<option value="<?= $generos[$i]->genero; ?>" <?= $generos[$i]->genero == $genero ? "selected" : ""; ?>><?= $generos[$i]->genero; ?></option>					
					<?php } ?>
				</select>
			</td>
		</tr>
	</table>
	</div>
	<?php if ($genero == "nuevo") { ?>
	<div class="capa_linea_datos">
	<table class="tabla_linea_datos">
		<tr>
			<td class="td_linea_01">Genero:</td>
			<td class="td_linea_02"><input type="text" id="genero2" name="genero2" style="width:70%; " value="<?= $genero2; ?>"></td>
		</tr>
	</table>
	</div>
	<?php } ?>
	<div class="capa_linea_datos">
	<table class="tabla_linea_datos">
		<tr>
			<td class="td_linea_01">A&ntilde;o:</td>
			<td class="td_linea_02">
				<select id="ano" name="ano">
				<?php for($i=date('Y'); $i > 1700; $i--) { ?>
				<option value="<?= $i; ?>" <?= $i == $ano ? "selected" : ""; ?>><?= $i; ?></option>			
				<?php } ?>
				</select>
			</td>
		</tr>
	</table>
	</div>
	<div class="capa_linea_datos">
	<table class="tabla_linea_datos">
		<tr>
			<td class="td_linea_01">Pais:</td>
			<td class="td_linea_02">
				<select id="pais" name="pais">
					<?php if ($artista == "nuevo") { ?>
					<option value="">--</option>
					<option value="nuevo" <?= $pais == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
					<?php } ?>
					<?php for($i=0; $i < count($paises); $i++ ) { ?>
					<option value="<?= $paises[$i]->pais; ?>" <?= $paises[$i]->pais == $pais ? "selected" : ""; ?>><?= $paises[$i]->pais; ?></option>					
					<?php } ?>
				</select>
			</td>
		</tr>
	</table>
	</div>
	<?php if ($pais == "nuevo") { ?>
	<div class="capa_linea_datos">
	<table class="tabla_linea_datos">
		<tr>
			<td class="td_linea_01">Pais:</td>
			<td class="td_linea_02"><input type="text" id="pais2" name="pais2" style="width:70%; " value="<?= $pais2; ?>"></td>
		</tr>
	</table>
	</div>
	<?php } ?>
	<?php if ($album == "nuevo") { ?>
	<div class="capa_linea_datos">
	<table class="tabla_linea_datos">
		<tr>
			<td class="td_linea_01">Foto:</td>
			<td class="td_linea_02"><input type="file" id="foto" name="foto" value=""></td>
		</tr>
	</table>
	</div>
	<?php } ?>
	<div class="capa_linea_datos">
	<table class="tabla_linea_datos">
		<tr>
			<td class="td_linea_01">Archivo:</td>
			<td class="td_linea_02"><input type="file" id="archivo" name="archivo" value=""></td>
		</tr>
	</table>
	</div>
	<div class="capa_linea_datos">
	<table class="tabla_linea_datos">
		<tr>
			<td class="td_linea_botones">
				<button name="boton_accion_song" type="button" style="cursor:pointer; ">Subir</button>
			</td>
			<td class="td_linea_botones">
				<button name="boton_accion_song" type="button" style="cursor:pointer; ">Cancelar</button>
			</td>
		</tr>
	</table>
	</div>
	</form>
</div>
<div id="capa-carga-musica">
	<div id="capa-sombra-carga"></div>
	<div id="capa-gif-carga">
		<img src="pics/03-05-45-320_512.gif" height="100%" border="0">
	</div>
</div>
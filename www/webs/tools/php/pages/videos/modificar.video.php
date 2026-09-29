<form id="form-mod-video" name="form-mod-video" method="post" action="" enctype="multipart/form-data">
<input type="hidden" id="token" name="token" value="<?= $t; ?>">
<input type="hidden" id="codigo" name="codigo" value="<?= $sesion->codigo; ?>">
<div class="capa_marco_videos_gral">
	<div class="capa_tabla_video_datos">
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01">Titulo:</div>
			<div class="capa_celda_datos_02"><input type="text" id="titulo" name="titulo" value="<?= $titulo; ?>" style="width:70%; "></div>
		</div>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01">Director:</div>
			<div class="capa_celda_datos_02">
				<select id="director" name="director">
					<option value="">--</option>
					<option value="nuevo" <?= $director == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
					<?php foreach($directores as $d) { ?>
					<option value="<?= $d->director; ?>" <?= $director == $d->director ? "selected" : ""; ?>><?= $d->director; ?></option>
					<?php } ?>
				</select>			
			</div>
		</div>
		<?php if ($director=="nuevo") { ?>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01"></div>
			<div class="capa_celda_datos_02"><input type="text" id="director2" name="director2" value="<?= $director2; ?>" style="width:70%; "></div>
		</div>
		<?php } ?>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01">Seccion:</div>
			<div class="capa_celda_datos_02">
				<select id="seccion" name="seccion">
					<option value="">--</option>
					<option value="nuevo" <?= $seccion == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
					<?php foreach($secciones as $s) { ?>
					<option value="<?= $s->seccion; ?>" <?= $seccion == $s->seccion ? "selected" : ""; ?>><?= $s->seccion; ?></option>
					<?php } ?>
				</select>			
			</div>
		</div>
		<?php if ($seccion=="nuevo") { ?>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01"></div>
			<div class="capa_celda_datos_02"><input type="text" id="seccion2" name="seccion2" value="<?= $seccion2; ?>" style="width:70%; "></div>
		</div>
		<?php } ?>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01">Categoria:</div>
			<div class="capa_celda_datos_02">
				<select id="categoria" name="categoria">
					<option value="">--</option>
					<option value="0" <?= $categoria == "0" ? "selected" : ""; ?>>Apta para todo publico</option>
					<option value="13" <?= $categoria == "13" ? "selected" : ""; ?>>Prohibido menores 13 a&ntilde;os</option>
					<option value="16" <?= $categoria == "16" ? "selected" : ""; ?>>Prohibido menores 16 a&ntilde;os</option>
					<option value="18" <?= $categoria == "18" ? "selected" : ""; ?>>Prohibido menores 18 a&ntilde;os</option>
					<option value="18p" <?= $categoria == "18p" ? "selected" : ""; ?>>Prohibido menores 18 a&ntilde;os / Reserva</option>
				</select>			
			</div>
		</div>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01">Pais:</div>
			<div class="capa_celda_datos_02">
				<select id="pais" name="pais">
					<option value="">--</option>
					<option value="nuevo" <?= $pais == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
					<?php foreach($paises as $p) { ?>
					<option value="<?= $p->pais; ?>" <?= $pais == $p->pais ? "selected" : ""; ?>><?= $p->pais; ?></option>
					<?php } ?>
				</select>			
			</div>
		</div>
		<?php if ($pais=="nuevo") { ?>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01"></div>
			<div class="capa_celda_datos_02"><input type="text" id="pais2" name="pais2" value="<?= $pais2; ?>" style="width:70%; "></div>
		</div>
		<?php } ?>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01">Idioma:</div>
			<div class="capa_celda_datos_02">
				<select id="idioma" name="idioma">
					<option value="">--</option>
					<option value="nuevo" <?= $idioma == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
					<?php foreach($idiomas as $i) { ?>
					<option value="<?= $i->idioma; ?>" <?= $idioma == $i->idioma ? "selected" : ""; ?>><?= $i->idioma; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<?php if ($idioma=="nuevo") { ?>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01"></div>
			<div class="capa_celda_datos_02"><input type="text" id="idioma2" name="idioma2" value="<?= $idioma2; ?>" style="width:70%; "></div>
		</div>
		<?php } ?>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01">Subtitulos:</div>
			<div class="capa_celda_datos_02">
				<select id="subs" name="subs">
					<option value="">--</option>
					<option value="si" <?= $subs == "si" ? "selected" : ""; ?>>Si</option>
					<option value="no" <?= $subs == "no" ? "selected" : ""; ?>>No</option>
				</select>			
			</div>
		</div>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01">Valor:</div>
			<div class="capa_celda_datos_02"><input type="text" id="valor" name="valor" value="<?= $valor; ?>" style="width:10%; "></div>
		</div>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01">Estreno:</div>
			<div class="capa_celda_datos_02">
				<select id="dia" name="dia">
					<option value="">--</option>
					<?php for($i=1; $i < 32; $i++) { ?>
					<option value="<?= $i < 10 ? "0" . $i : $i; ?>" <?= $dia == $i ? "selected" : ""; ?>><?= $i < 10 ? "0" . $i : $i; ?></option>
					<?php } ?>
				</select> /
				<select id="mes" name="mes">
					<option value="">--</option>
					<?php for($j=1; $j < 13; $j++) { ?>
					<option value="<?= $j < 10 ? "0" . $j : $j; ?>" <?= $mes == $j ? "selected" : ""; ?>><?= $j < 10 ? "0" . $j : $j; ?></option>
					<?php } ?>
				</select> /
				<select id="ano" name="ano">
					<option value="">--</option>
					<?php for($k=date("Y"); $k > 1900; $k--) { ?>
					<option value="<?= $k; ?>" <?= $ano == $k ? "selected" : ""; ?>><?= $k; ?></option>
					<?php } ?>
				</select>			
			</div>
		</div>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01">Estudio:</div>
			<div class="capa_celda_datos_02">
				<select id="estudio" name="estudio">
					<option value="">--</option>
					<option value="nuevo" <?= $estudio == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
					<?php foreach($estudios as $e) { ?>
					<option value="<?= $e->estudio; ?>" <?= $estudio == $e->estudio ? "selected" : ""; ?>><?= $e->estudio; ?></option>
					<?php } ?>
				</select>			
			</div>
		</div>
		<?php if ($estudio=="nuevo") { ?>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01"></div>
			<div class="capa_celda_datos_02"><input type="text" id="estudio2" name="estudio2" value="<?= $estudio2; ?>" style="width:70%; "></div>
		</div>
		<?php } ?>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01">Video:</div>
			<div class="capa_celda_datos_02"><input type="file" id="archivo" name="archivo" value=""></div>
		</div>
		<div class="capa_row_datos_01">
			<div class="capa_celda_datos_01">Foto:</div>
			<div class="capa_celda_datos_02">
			<img id="img_prv" src="/videos/pics/<?= $foto_p; ?>" class="img_prv" style=" " align="absmiddle">
			<input type="hidden" id="foto_p" name="foto_p" value="<?= $foto_p; ?>">
			<input type="file" id="foto" name="foto" value="">
			</div>
		</div>
		<div class="capa_row_datos_02">
			<div class="capa_celda_datos_03">Descripcion:</div>
			<div class="capa_celda_datos_04"><textarea id="texto" name="texto" style="width:70%; height:100%; vertical-align:top; "><?= $texto; ?></textarea></div>
		</div>
	</div>
	<div class="capa_tabla_video_datos">
		<div class="capa_row_datos_01">
			<div class="capa_celda_boton_datos"><button name="boton_accion_peli" type="button" style="cursor:pointer ">Subir</button></div>
			<div class="capa_celda_boton_datos"><button name="boton_accion_peli" type="button" style="cursor:pointer ">Cancelar</button></div>
		</div>
	</div>
</div>
<div id="capa-carga-animacion" class="capa_marco_acciones_gral">
	<div class="capa_marco_sombra_gral"></div>
	<div class="capa_imagen_animacion"><img src="pics/03-05-45-320_512.gif" class="img_load"></div>
</div>
</form>
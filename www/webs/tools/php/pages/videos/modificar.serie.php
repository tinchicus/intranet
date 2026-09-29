<form id="form-mod-serie" name="form-mod-serie" method="post" action="" enctype="multipart/form-data">
<input type="hidden" id="token" name="token" value="<?= $t; ?>">
<input type="hidden" id="codigo" name="codigo" value="<?= $sesion->codigo; ?>">
<div class="capa_marco_videos_gral">
	<div class="capa_tabla_serie_datos">
		<div class="capa_row_serie_datos_01">
			<div class="capa_celda_serie_datos_01">Titulo:</div>
			<div class="capa_celda_serie_datos_02"><input type="text" id="titulo" name="titulo" value="<?= $titulo; ?>" style="width:70%; "></div>
		</div>
		<div class="capa_row_serie_datos_01">
			<div class="capa_celda_serie_datos_01">Seccion:</div>
			<div class="capa_celda_serie_datos_02">
				<select id="seccion" name="seccion">
					<option value="">--</option>
					<?php foreach($secciones as $s) { ?>
					<option value="<?= $s->seccion; ?>" <?= $s->seccion == $seccion ? "selected" : ""; ?>><?= $s->seccion; ?></option>
					<?php } ?>
				</select>			
			</div>
		</div>
		<div class="capa_row_serie_datos_01">
			<div class="capa_celda_serie_datos_01">Categoria:</div>
			<div class="capa_celda_serie_datos_02">
				<select id="categoria" name="categoria">
					<option value="">--</option>
					<option value="0" <?= $categoria == "0" ? "selected" : ""; ?>>Apta Todo Publico</option>
					<option value="13" <?= $categoria == "13" ? "selected" : ""; ?>>Prohibido Menores 13 a&ntilde;os</option>
					<option value="16" <?= $categoria == "16" ? "selected" : ""; ?>>Prohibido Menores 16 a&ntilde;os</option>
					<option value="18" <?= $categoria == "18" ? "selected" : ""; ?>>Prohibido Menores 18 a&ntilde;os</option>
					<option value="18p" <?= $categoria == "18p" ? "selected" : ""; ?>>Prohibido Menores 18 a&ntilde;os / Reserva</option>
				</select>			
			</div>
		</div>
		<div class="capa_row_serie_datos_01">
			<div class="capa_celda_serie_datos_01">Foto:</div>
			<div class="capa_celda_serie_datos_02">
			<img id="img_prv" src="/videos/pics/<?= $foto_p; ?>" style="border:0px; height:65; " align="absmiddle">
			<input type="hidden" id="foto_p" name="foto_p" value="<?= $foto_p; ?>">
			<input type="file" id="foto" name="foto" value="">
			</div>
		</div>
		<div class="capa_row_serie_datos_02">
			<div class="capa_celda_serie_datos_03">Descripion:</div>
			<div class="capa_celda_serie_datos_04"><textarea id="texto" name="texto" style="width:70%; height:100%; "><?= $texto; ?></textarea></div>
		</div>
	</div>
	<div class="capa_tabla_serie_datos">
		<div class="capa_row_serie_datos_01">
			<div class="capa_celda_series_boton_01"><button name="boton_accion_peli" type="button" style="cursor:pointer ">Subir</button></div>
			<div class="capa_celda_series_boton_01"><button name="boton_accion_peli" type="button" style="cursor:pointer ">Cancelar</button></div>
		</div>
	</div>
	<div class="capa_tabla_serie_datos_mini">
		<div class="capa_lista_serie_datos_01">
			<div class="capa_filtro_serie_datos"></div>
			<div class="capa_lista_serie_datos_03">
				<div class="tabla_lista_serie_datos">
				<?php foreach($pelis as $p) { ?>
				<div class="row_lista_sserie_datos">
				<div class="celda_lista_serie_datos_01"><button type="button" name="boton_lista_add" class="boton_lista_series">+</button></div>
				<div name="titulo_video" class="celda_lista_serie_datos_02">
				<?= $p->titulo; ?>
				<input type="hidden" name="archivo_serie" value="<?= $p->archivo; ?>">
				</div>
				</div>
				<?php } ?>
				</div>
			</div>
		</div>
		<div id="capa-lista-videos-agregados" class="capa_lista_serie_datos_02">
		Videos de la lista:
			<div class="tabla_lista_serie_datos">
			<?php foreach($videos_l as $v) { 
				$elem = explode(";", $v);
			?>
			<div class="row_lista_sserie_datos">
			<div class="celda_lista_serie_datos_01"><button type="button" name="boton_video_omt" class="boton_lista_series"><?= $elem[2] == "no" ? "+" : "-"; ?></button></div>
			<div name="titulo_lista_videos" class="celda_lista_serie_datos_02" style="background-color:<?= $elem[2] == "no" ? "#fff" : "#CCC"; ?>; ">
				<?= $elem[1]; ?>
				<input type="hidden" id="videos_l" name="videos_l[]" value="<?= $elem[0]; ?>;<?= $elem[1]; ?>;<?= $elem[2]; ?>">
			</div>
			</div>
			<?php } ?>
			</div>
		</div>
		<div id="capa-lado-izquierdo-mini" class="capa_lista_serie_datos_04">
		<div style="display:table; width:100%; height:100%; border:0px; border-spacing:0px; padding:0px; ">
			<div style="display:table-row; width:100%; height:100%; ">
				<div style="display:table-cell; text-align:center; vertical-align:middle; width:10%; border:0px solid black; border-spacing:0px; padding:0px; ">
					<button type="button" name="boton_mover_lista" style="cursor:pointer; background-color:#000000; border-radius:50%; "><img src="pics/atras.png" style="width:100%; border:0px "></button>
				</div>
				<div style="display:table-cell; width:90%; border:0px solid black; border-spacing:0px; padding:0px; ">
					<div class="capa_filtro_serie_datos"></div>
					<div class="capa_lista_serie_datos_03">
					<div class="tabla_lista_serie_datos">
					<?php foreach($pelis as $p) { ?>
					<div class="row_lista_sserie_datos">
					<div class="celda_lista_serie_datos_01"><button type="button" name="boton_lista_add" class="boton_lista_series">+</button></div>
					<div name="titulo_video" class="celda_lista_serie_datos_02">
					<?= $p->titulo; ?>
					<input type="hidden" name="archivo_serie" value="<?= $p->archivo; ?>">
					</div>
					</div>
					<?php } ?>
					</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div id="capa-lado-derecho-mini" class="capa_lista_serie_datos_05">
		<div style="display:table; width:100%; height:100%; border:0px; border-spacing:0px; padding:0px; ">
			<div style="display:table-row; width:100%; height:100%; ">
				<div id="capa-lista-videos-agregados-mini" style="display:table-cell; text-align:center; vertical-align:top; width:90%; border:0px solid black; border-spacing:0px; padding:0px; overflow-x:hidden; overflow-y:auto; ">
					Videos de la lista:
					<div class="capa_lista_serie_datos_03">
					<div class="tabla_lista_serie_datos">
					<?php foreach($videos_l as $v) { 
						$elem = explode(";", $v);
						?>
						<div class="row_lista_sserie_datos">
						<div class="celda_lista_serie_datos_01"><button type="button" name="boton_video_omt" class="boton_lista_series"><?= $elem[2] == "no" ? "+" : "-"; ?></button></div>
						<div class="celda_lista_serie_datos_02" style="background-color:<?= $elem[2] == "no" ? "#fff" : "#CCC"; ?>; ">
						<?= $elem[1]; ?>
						</div>
						</div>
					<?php } ?>
					</div>
					</div>
				</div>
				<div style="display:table-cell; text-align:center; vertical-align:middle; width:10%; border:0px solid black; border-spacing:0px; padding:0px; "><button type="button" name="boton_mover_lista" style="cursor:pointer; background-color:#000000; border-radius:50%; "><img src="pics/adelante.png" style="width:100%; border:0px "></button></div>
			</div>
		</div>
		</div>
	</div>
</div>
</form>
<form id="form_mod_frase" name="form_mod_frase" method="post" action="" enctype="multipart/form-data">
<input type="hidden" id="token" name="token" value="<?= $t; ?>">
<input type="hidden" id="id" name="id" value="<?= $sesion->id; ?>">

<div class="capa_marco_frases_gral">
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Autor:</div>
			<div class="capa_celda_datos_02">
				<select name="autor" id="autor">
					<option value="">--</option>
					<option value="nuevo" <?= $autor == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
					<?php for($i=0; $i < count($autores); $i++) { ?>
					<option value="<?= $autores[$i]->id_autor; ?>" <?= $autores[$i]->id_autor == $autor ? "selected" : ""; ?>><?= $autores[$i]->apellido_autor; ?>, <?= $autores[$i]->nombre_autor; ?></option>
					<?php } ?>
				</select>			
			</div>
		</div>
	</div>
	<?php if ($autor == "nuevo") { ?>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Nombre:</div>
			<div class="capa_celda_datos_02"><input type="text" name="nombre" id="nombre" value="<?= $nombre; ?>"></div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Apellido:</div>
			<div class="capa_celda_datos_02"><input type="text" name="apellido" id="apellido" value="<?= $apellido; ?>"></div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Pais:</div>
			<div class="capa_celda_datos_02">
				<select name="pais" id="pais">
					<option value="">--</option>
					<option value="nuevo" <?= $pais == "nuevo" ? "selected" : ""; ?>>Nuevo</option>
					<?php for($i=0; $i < count($paises); $i++) { ?>
					<option value="<?= $paises[$i]->pais_autor; ?>" <?= $paises[$i]->pais_autor == $pais ? "selected" : ""; ?>><?= $paises[$i]->pais_autor; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
	</div>
	<?php if ($pais == "nuevo") { ?>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Pais:</div>
			<div class="capa_celda_datos_02"><input type="text" name="pais2" id="pais2" value="<?= $pais2; ?>"></div>
		</div>
	</div>
	<?php } ?>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_01">Foto:</div>
			<div class="capa_celda_datos_02"><input type="file" name="foto" id="foto" value=""></div>
		</div>
	</div>
	<?php } ?>
	<div class="capa_linea_datos_frase">
		<div class="capa_tabla_datos">
			<div class="capa_celda_datos_03">Frase:</div>
			<div class="capa_celda_datos_02"><textarea id="texto" name="texto"><?= $texto; ?></textarea></div>
		</div>
	</div>
	<div class="capa_linea_datos">
		<div class="capa_tabla_datos">
			<div class="capa_celda_boton"><button type="button" name="boton_accion_mod" class="boton_modif_frase">Subir</button></div>
			<div class="capa_celda_boton"><button type="button" name="boton_accion_mod" class="boton_modif_frase">Cancelar</button></div>
		</div>
	</div>
</div>
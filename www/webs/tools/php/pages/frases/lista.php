<div class="capa_marco_frases_gral">
	<div class="capa_linea_datos">
		<button id="boton-agregar" type="button">Agregar nueva frase</button>
	</div>
	<div class="capa_grilla_frases" style="">
		<div id="capa_frase_titulo_01" class="capa_tabla_frases_01">
			<div class="capa_celda_frases">Frase</div>
		</div>
		<div id="capa_frase_titulo_02" class="capa_tabla_frases_01">
			<div class="capa_celda_frases">Autor</div>
		</div>
		<div id="capa_frase_titulo_03" class="capa_tabla_frases_01">
			<div class="capa_celda_frases">Acciones</div>
		</div>
		<?php for($i=0; $i < count($lista); $i++) { ?>		
		<div id="capa_frase_datos_01" class="capa_tabla_frases_02">
			<div class="capa_celda_frases"><?= strlen($lista[$i]->texto) > 100 ? substr($lista[$i]->texto, 0, 97) . "..." : $lista[$i]->texto; ?></div>
		</div>
		<div id="capa_frase_datos_02" class="capa_tabla_frases_02">
			<div class="capa_celda_frases"><?= $lista[$i]->nombre; ?> <?= $lista[$i]->apellido; ?></div>
		</div>
		<div id="capa_frase_datos_03" class="capa_tabla_frases_02">
			<div class="capa_celda_frases">
				<input type="hidden" id="id_frase" name="id_frase" value="<?= $lista[$i]->id; ?>">
				<button type="button" name="boton_modif" title="Modificar Frases" class="boton_accion" style="background-image:url(pics/tools.png);  "></button>
				<button type="button" name="boton_ver" title="Ver Frase" class="boton_accion" style="background-image:url(pics/info.png); "></button>
				<button type="button" name="boton_elim" title="Eliminar Frase" class="boton_accion" style="background-image:url(pics/cerrarmhm.png); "></button>				
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<div id="capa-marco-ver-frase" class="capa_marco_gral_acciones">
	<div class="capa_marco_gral_sombra"></div>
	<div id="capa-ajax-frase"></div>
</div>
<div id="capa-marco-eliminar-frase" class="capa_marco_gral_acciones">
	<div class="capa_marco_gral_sombra"></div>
	<div id="capa-dialogo-eliminar">
		<div class="capa_row_dialogo_eliminar">
			<div class="capa_celda_dialogo_eliminar">Deseas eliminar esta frase ?</div>
		</div>
		<div class="capa_row_dialogo_eliminar">
			<div class="capa_celda_dialogo_eliminar">
				<input type="hidden" id="dato_elim" name="dato_elim" value="">			
				<button  name="boton_accion_del" style="width:100; cursor:pointer; ">Si</button>
				&nbsp;&nbsp;&nbsp;
				<button  name="boton_accion_del" style="width:100; cursor:pointer; ">No</button>
			</div>
		</div>
	</div>
</div>
<div class="capa_marco_menu">
	<div class="capa_tabla_menu">
		<div class="capa_celda_menu_foto">
			<img src="pics/foto-perfil.png" class="img_foto_perfil">
		</div>
		<div class="capa_celda_menu_datos">
			<table class="tabla_menu_datos">
				<tr>
					<td class="td_tabla_datos_01">Bienvenido <?= $datos->userid; ?></td>
				</tr>
				<tr>
					<td class="td_tabla_datos_02">
						<?php if ($app==1) { ?>
						<button id="btn_volver" type="button"><img src="pics/atras.png" class="img_menu" align="absmiddle">Volver</button>
						<?php } ?>
						<button id="btn_salir" type="button">Salir<img src="pics/cerrarmhm.png" class="img_menu" align="absmiddle"></button>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
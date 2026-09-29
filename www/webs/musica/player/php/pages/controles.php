<audio id="tape" src="../../../musica/<?= $cancion->archivo; ?>"></audio>
<div class="capa_tabla_controles_musica">
	<div class="capa_row_conrroles_player_01">
	<div class="tabla_celda_controles_musica">
	<input type="range" value="0" min="0" max="100" id="seekbar" name="seekbar" class="barra_seguimiento" min="0" max="100">
	<span id="tiempo" style="color:#FFFFFF">--:--</span>
	</div>
	</div>	
	<div class="capa_row_conrroles_player_02">
	<div class="tabla_celda_controles_musica">
	<button type="button" name="boton_control_player" class="boton_control_player" style="background-image:url(pics/rew.png);  "></button>
	<button type="button" name="boton_control_player" class="boton_control_player" style="background-image:url(pics/mas.png);"></button>
	<button type="button" name="boton_control_player" class="boton_control_player" style="background-image:url(pics/pausemhm.png);"></button>
	<button type="button" name="boton_control_player" class="boton_control_player" style="background-image:url(pics/straight.png);"></button>
	<button type="button" name="boton_control_player" class="boton_control_player" style="background-image:url(pics/ff.png);"></button>
	</div>	
	</div>
</div>
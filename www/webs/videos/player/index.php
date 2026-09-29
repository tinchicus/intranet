<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	
	require 'php/clases.php';
	require 'php/datos.php';

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/player.css" type="text/css"/>
<title><?= $peli->titulo; ?></title>
<input type="hidden" id="codigo_prx" value="<?= $proximo->codigo; ?>">
<input type="hidden" id="tipo_prx" value="<?= $proximo->tipo; ?>">
<input type="hidden" id="track_prx" value="<?= $proximo->track; ?>">

<video id="vhs" style=" " controls src="../../../videos/<?= $peli->archivo; ?>" poster="../../../videos/pics/<?= $peli->foto; ?>"></video>
<div id="capa-menu-botones-player" class="capa_menu_botones_player">
	<div class="capa_tabla_botones_player">
		<div class="capa_row_botones_player">
			<div class="capa_celda_botones_player">
				<button type="button" name="boton_player_menu" class="boton_volver_menu_player"></button>
			</div>
			<div class="capa_celda_datos_player">
			<?= $peli->seccion;?><br>
			<?= $peli->titulo;?><br>
			<?= $peli->categoria;?>			
			</div>
			<div class="capa_celda_botones_player">
				<button type="button" name="boton_player_menu" class="boton_ff_menu_player"></button>
			</div>
		</div>
	</div>
</div>
<div id="capa-pausa-player" class="capa_pausa_player">
	<div class="capa_sombra_pausa_player"></div>
	<div class="capa_pausa_botones_player">
		<div class="capa_tabla_botones_player">
			<div class="capa_row_botones_player">
				<div class="capa_celda_botones_player">
					<button type="button" name="boton_player_menu" class="boton_volver_menu_player"></button>
				</div>
				<div class="capa_celda_datos_player" class="capa_celda_datos_player"></div>
				<div class="capa_celda_botones_player">
					<button type="button" name="boton_player_menu" class="boton_ff_menu_player"></button>
				</div>
			</div>
		</div>
	</div>
	<div class="capa_marco_datos_pausa_player">
		<div class="capa_tabla_datos_pausa_player">
			<div class="capa_row_datos_pausa_player">
				<div class="capa_celda_datos_pausa_player_01">
					<?= $sesion->tipo != "Video" ? $datos->titulo . "<br>" : ""; ?>
					<?= $peli->titulo; ?>
				</div>
			</div>
		</div>
		<div class="capa_tabla_datos_pausa_player">
			<div class="capa_row_datos_pausa_player">
				<div class="capa_celda_datos_pausa_player_02">Director:</div>
				<div class="capa_celda_datos_pausa_player_03"><?= $peli->director; ?></div>
			</div>
			<div class="capa_row_datos_pausa_player">
				<div class="capa_celda_datos_pausa_player_02">Seccion:</div>
				<div class="capa_celda_datos_pausa_player_03"><?= $peli->seccion; ?></div>
			</div>
			<div class="capa_row_datos_pausa_player">
				<div class="capa_celda_datos_pausa_player_02">Categoria:</div>
				<div class="capa_celda_datos_pausa_player_03"><?= $peli->categoria; ?></div>
			</div>
			<div class="capa_row_datos_pausa_player">
				<div class="capa_celda_datos_pausa_player_02">Estreno:</div>
				<div class="capa_celda_datos_pausa_player_03"><?= $peli->estreno; ?></div>
			</div>
			<div class="capa_row_datos_pausa_player">
				<div class="capa_celda_datos_pausa_player_02">Estudio:</div>
				<div class="capa_celda_datos_pausa_player_03"><?= $peli->estudio; ?></div>
			</div>
			<div class="capa_row_datos_pausa_player">
				<div class="capa_celda_datos_pausa_player_02">Pais:</div>
				<div class="capa_celda_datos_pausa_player_03"><?= $peli->pais; ?></div>
			</div>
		</div>
		<div class="capa_tabla_datos_pausa_player">
			<div class="capa_row_datos_pausa_player">
				<div class="capa_celda_datos_pausa_player_02">Idioma:</div>
				<div class="capa_celda_datos_pausa_player_04" style=""><?= $peli->idioma; ?></div>
				<div class="capa_celda_datos_pausa_player_05" style="">Subs:</div> 
				<div class="capa_celda_datos_pausa_player_06" style=""><?= $peli->subtitulo; ?></div>
			</div>
		</div>
		<div class="capa_tabla_datos_pausa_player">
			<div class="capa_row_datos_pausa_player">
				<div class="capa_celda_datos_pausa_player_07">
					&quot;<?= $peli->texto; ?>&quot;
				</div>
			</div>
		</div>
	</div>
</div>

<script language="javascript" src="js/player.js"></script>

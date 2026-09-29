<?php
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	if (isset($_REQUEST["ancho"])) { $ancho=$_REQUEST["ancho"]; } else { $ancho=""; }
	if (isset($_REQUEST["id"])) { $id=$_REQUEST["id"]; } else { $id=""; }

	include("intranet.inc");
	$con=base_connect("intranet");
	
	$l=0;
	$chequeo = substr($codigo,0,2);
	
	if ($chequeo == "PL")
	{
		$queryLista = "select archivo from musica_playlists where codigo='$codigo' order by track asc";
		$qLista = mysqli_query($con, $queryLista);
		while($lala = mysqli_fetch_array($qLista))
		{
			$archivo[$l] = $lala[0];
			$queryDatos = "select artista, titulo, pais, genero, ano, disco, foto from musica_canciones where archivo='" . $archivo[$l] . "'";
			$qDatos = mysqli_query($con, $queryDatos);
			while($lele = mysqli_fetch_array($qDatos))
			{
				$artista[$l] = $lele[0];
				if ($artista[$l])
				{
					$titulo[$l] = $lele[1];
					$pais[$l] = $lele[2];
					$genero[$l] = $lele[3];
					$ano[$l] = $lele[4];
					$disco[$l] = $lele[5];
					$foto[$l] = $lele[6];
					$queryDisco = "select titulo from musica_discos where id=" . $disco[$l];
					$qDisco = mysqli_query($con, $queryDisco);
					while ($lili = mysqli_fetch_array($qDisco)) { $disco[$l] = $lili[0]; }
					$l++;
				}
			}
		}
	} else {
		$queryDatos = "select artista, titulo, pais, genero, ano, foto, archivo from musica_canciones where disco=$codigo order by track asc";
		$qDatos = mysqli_query($con, $queryDatos);
		while($lele = mysqli_fetch_array($qDatos))
		{
			$artista[$l] = $lele[0];
			$titulo[$l] = $lele[1];
			$pais[$l] = $lele[2];
			$genero[$l] = $lele[3];
			$ano[$l] = $lele[4];
			$foto[$l] = $lele[5];		
			$archivo[$l] = $lele[6];		
			$queryDisco = "select titulo from musica_discos where id=$codigo";
			$qDisco = mysqli_query($con, $queryDisco);
			while($lala = mysqli_fetch_array($qDisco)) 
			{ 
				$disco[$l] = $lala[0]; 
			}
			$l++;
		}
	}
	$prx = $id + 1;
	$ant = $id - 1;
	if ($prx >= $l) $prx = 0;
	if ($ant < 0) $ant = $l-1;

?>
<audio id="tape" src="../../musica/<?= $archivo[$id]; ?>" autoplay onended="cambiar(<?= $prx; ?>,'<?= $codigo; ?>',<?= $ancho ?>)"></audio>
<div class="capa_tabla_ajax_player">
	<div class="row_tabla_ajax_player">
		<div class="celda_tabla_lista"></div>
		<div style="display:table-cell;" >
			<div class="tabla_ajax_player" style="background-image:url(../../musica/pics/<?= $foto[$id] ? $foto[$id] : "fondo.jpg"; ?>);  ">
				<div class="tabla_row_ajax_player_01">
					<div class="tabla_celda_ajax_player">
					<button type="button" onClick="cambiar(<?= $ant; ?>,'<?= $codigo; ?>',<?= $ancho ?>)" class="boton_ajax_player" style="background-image:url(pics/rew.png);  "></button>
					<button type="button" id="boton-play" onClick="playit()" class="boton_ajax_player" style="background-image:url(pics/pausemhm.png); "></button>
					<button type="button" onClick="cambiar(<?= $prx; ?>,'<?= $codigo; ?>',<?= $ancho ?>)" class="boton_ajax_player" style="background-image:url(pics/ff.png); "></button>
					<button type="button" onClick="cerrar_plr()" class="boton_ajax_player" style="background-image:url(pics/cerrarmhm.png); "></button>
					</div>
				</div>
				<div class="tabla_row_ajax_player_02">
					<div class="tabla_celda_datos_ajax">
					<span class="texto_datos_ajax"><?= $genero[$id]; ?></span><br>
					<span class="texto_datos_ajax"><?= $artista[$id]; ?> - <?= $titulo[$id]; ?></span><br>
					<span class="texto_datos_ajax"><?= $disco[$id]; ?></span><br>
					<span class="texto_datos_ajax"><?= $ano[$id]; ?> / <?= $pais[$id]; ?></span><br>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }

	include("intranet.inc");	
	$con=base_connect("intranet");

	$queryDatos = "select * from musica_canciones where id=$codigo";
	$qDatos = mysqli_query($con, $queryDatos);
	while($lala = mysqli_fetch_array($qDatos))
	{
		$id = $lala[0];
		$artista = $lala[1];
		$titulo = $lala[2];
		$pais = $lala[3];
		$genero = $lala[4];
		$ano = $lala[5];
		$id_disco = $lala[6];
		$tipo = $lala[7];
		$track = $lala[8];
		$foto = $lala[9];
		$archivo = $lala[10];
		$creado = $lala[11];
		$modificado = $lala[12];
		$creador = $lala[13];
		$queryDisco = "select titulo from musica_discos where id=$id_disco";
		$qDisco = mysqli_query($con, $queryDisco);
		while($lele = mysqli_fetch_array($qDisco)) { $tit_disco = $lele[0]; }
	}
?>

<div id="capa-marco-ver-cancion" style="position:absolute; left:0; top:0; width:100%; height:100%; background-color:#fff; ">
	<div class="capa_foto_musica_ajax" style=" background-image:url(../../../musica/pics/<?= $foto ? $foto : "fondo.jpg"; ?>); ">
	<button type="button" style="width:100%; height:100%; background-color:transparent; border:0px; cursor:pointer;" onClick="play_song();">
		<img id="img-tape-accion" src="pics/play.mhm.png" style="height:100%; border:0px; ">
	</button>
	<audio id="tape" src="../../../musica/<?= $archivo; ?>"></audio>
	</div>
	<div class="capa_datos_musica_ajax">
		Artista: <?= $artista; ?><br>
		Titulo: <?= $titulo; ?><br>
		Disco: <?= $tit_disco; ?><br>
		Pais: <?= $pais; ?><br>
		Genero: <?= $genero; ?><br>
		A&ntilde;o: <?= $ano; ?>
	</div>
	<div class="capa_log_musica_ajax">
	<strong>ID:</strong> <?= $id; ?> - <strong>Tipo:</strong> <?= $tipo; ?> - <strong>Track:</strong> <?= $track;?> - <strong>Creado:</strong> <?= $creado; ?> - <strong>Ult. Modificacion:</strong> <?= $modificado; ?> - <strong>Usuario:</strong> <?= $creador; ?>
	</div>
	<div class="capa_boton_musica_ajax">
		<button type="button" style="cursor:pointer; width:150; " onClick="cerrar_info()">Cerrar</button>
	</div>
</div>
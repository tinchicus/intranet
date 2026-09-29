<?php
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }

	class Datos
	{
		public $artista;
		public $titulo;
		public $foto;
		public $archivo;
	}

	include("intranet.inc");	
	$con=base_connect("intranet");
	
	$queryDatos = "select * from musica_discos where id=$codigo";
	$qDatos = mysqli_query($con, $queryDatos);
	while($lala = mysqli_fetch_array($qDatos))
	{
		$id = $lala[0];
		$artista = $lala[1];
		$titulo = $lala[2];
		$pais = $lala[3];
		$ano = $lala[4];
		$genero = $lala[5];
		$foto = $lala[6];
		$creado = $lala[7];
		$modificado = $lala[8];
		$user = $lala[9];
	}

	$canciones = Array();
	$l = 0;
	$queryCanciones = "select artista, titulo, foto, archivo from musica_canciones where disco=$codigo order by track asc";
	$qCanciones = mysqli_query($con, $queryCanciones);
	while($lele = mysqli_fetch_array($qCanciones))
	{
		$cancion[$l] = new Datos();
		$cancion[$l]->artista = $lele[0];
		$cancion[$l]->titulo = $lele[1];
		$cancion[$l]->foto = $lele[2];
		$cancion[$l]->archivo = $lele[3];
		array_push($canciones, $cancion[$l]);
		$l++;
	}
?>
<div id="capa-marco-ver-disco" style="position:absolute; left:0; top:0; width:100%; height:100%; background-color:#fff; ">
	<div class="capa_foto_musica_ajax" style=" background-image:url(../../../musica/pics/<?= $foto ? $foto : "fondo.jpg"; ?>);  ">
	<button type="button" style="width:100%; height:100%; background-color:transparent; border:0px; cursor:pointer;" onClick="play_song();">
		<img id="img-tape-accion" src="pics/play.mhm.png" style="height:100%; border:0px; ">
	</button>
	<audio id="tape" src="../../../musica/<?= $canciones[0]->archivo; ?>" onended="siguiente()"></audio>
	</div>
	<div class="capa_datos_musica_ajax">
		Artista: <?= $artista; ?><br>
		Titulo: <?= $titulo; ?><br>
		Pais: <?= $pais; ?><br>
		Genero: <?= $genero; ?><br>
		A&ntilde;o: <?= $ano; ?>
	</div>
	<div class="capa_log_musica_ajax">
	<strong>ID:</strong> <?= $id; ?> - <strong>Creado:</strong> <?= $creado; ?> - <strong>Ult. Modificacion:</strong> <?= $modificado; ?> - <strong>Usuario:</strong> <?= $user; ?>
	</div>
	<div class="capa_boton_musica_ajax">
		<button type="button" style="cursor:pointer; width:150; " onClick="cerrar_info()">Cerrar</button>
	</div>
	<div class="capa_lista_canciones_ajax">
		<?php for($i=0; $i < count($canciones); $i++) { ?>
		<input type="hidden" name="archi_lst" value="<?= $canciones[$i]->archivo; ?>">
		<button type="button" style="width:100%; height:60; cursor:pointer; " onClick="elegir_track(<?= $i; ?>);"><?= $canciones[$i]->titulo; ?></button>
		<?php } ?>
	</div>
</div>
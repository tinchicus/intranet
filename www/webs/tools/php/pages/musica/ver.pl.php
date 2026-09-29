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
	
	$queryDatos = "select distinct codigo,titulo,foto,tipo,genero,creado,modificado,usuario from musica_playlists where codigo='$codigo'";
	$qDatos = mysqli_query($con, $queryDatos);
	while($lala = mysqli_fetch_array($qDatos))
	{
		$id = $lala[0];
		$titulo = $lala[1];
		$foto = $lala[2];
		$tipo = $lala[3];
		$genero = $lala[4];
		$creado = $lala[5];
		$modificado = $lala[6];
		$user = $lala[7];
		
	}

	$canciones = Array();
	$l = 0;
	$queryCanciones = "select archivo from musica_playlists where codigo='$codigo' order by track asc";
	$qCanciones = mysqli_query($con, $queryCanciones);
	while($lele = mysqli_fetch_array($qCanciones))
	{
		$cancion[$l] = new Datos();
		$cancion[$l]->archivo = $lele[0];
		$queryCancion = "select artista, titulo, foto from musica_canciones where archivo='" . $cancion[$l]->archivo . "'";
		$qCancion = mysqli_query($con, $queryCancion);
		while($lili = mysqli_fetch_array($qCancion))
		{
			$cancion[$l]->artista = $lili[0];
			$cancion[$l]->titulo = $lili[1];
			$cancion[$l]->foto = $lili[2];
		}
		array_push($canciones, $cancion[$l]);
		$l++;
	}
?>
<div id="capa-marco-ver-pl" style="position:absolute; left:0; top:0; width:100%; height:100%; background-color:#fff; ">
	<div class="capa_foto_musica_ajax" style=" background-image:url(../../../musica/pics/<?= $foto ? $foto : "fondo.jpg"; ?>); ">
	<button type="button" style="width:100%; height:100%; background-color:transparent; border:0px; cursor:pointer;" onClick="play_song();">
		<img id="img-tape-accion" src="pics/play.mhm.png" style="height:100%; border:0px; ">
	</button>
	<audio id="tape" src="../../../musica/<?= $canciones[0]->archivo; ?>" onended="siguiente()"></audio>
	</div>
	<div class="capa_datos_musica_ajax">
		Titulo: <?= $titulo; ?><br>
		Tipo: <?= $tipo; ?><br>
		Genero: <?= $genero; ?><br>
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
		<button type="button" style="width:100%; height:60; cursor:pointer; text-align:center; vertical-align:middle; color:#000000;" onClick="elegir_track(<?= $i; ?>);">
			<?= $canciones[$i]->artista; ?><br><?= $canciones[$i]->titulo; ?>
		</button>
		<?php } ?>
	</div>	
</div>
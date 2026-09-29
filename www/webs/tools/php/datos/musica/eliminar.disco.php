<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["id"])) { $id=$_REQUEST["id"]; } else { $id=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	class Datos
	{
		public $id;
		public $artista;
		public $titulo;
		public $pais;
		public $genero;
		public $ano;
		public $id_disco;
		public $tit_disco;
		public $tipo;
		public $track;
		public $foto;
		public $archivo;
	}
	
	$l = 0;
	$archivos = Array();
	$queryArchivos = "select archivo, foto from musica_canciones where disco = '$codigo' order by track asc";
	$qArchivos = mysqli_query($con, $queryArchivos);
	while($lala = mysqli_fetch_array($qArchivos))
	{
		$datos[$l] = new Datos();
		$datos[$l]->archivo = $lala[0];
		$datos[$l]->foto = $lala[1];
		array_push($archivos, $datos[$l]);
		$l++;
	}
	
	foreach($archivos as $a)
	{
		$removeFile = "rm /musica/$a->archivo";
		system($removeFile);
	}

	if ($archivos[0]->foto) 
	{
		$removePic = "rm /musica/pics/" . $archivos[0]->foto;
		system($removePic);
	}
	
	$queryCanciones = "delete from musica_canciones where disco='$codigo'";
	$qCanciones = mysqli_query($con, $queryCanciones);
	$queryDiscos = "delete from musica_discos where id='$codigo'";
	$qDiscos = mysqli_query($con, $queryDiscos);
	$queryLista = "delete from musica_lista where codigo='$codigo'";
	$qDiscos = mysqli_query($con, $queryLista);
	
	header('location: ../../../musica.php?t=' . $t . '&app=1&id=0');
?>
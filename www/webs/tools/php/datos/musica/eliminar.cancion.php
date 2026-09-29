<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["id"])) { $id=$_REQUEST["id"]; } else { $id=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");

	$queryDatos = "select archivo, foto, disco from musica_canciones where id='$codigo'";
	echo $queryDatos;;
	$qDatos = mysqli_query($con, $queryDatos);
	while($lala = mysqli_fetch_array($qDatos)) { 
		$archivo = $lala[0]; 
		$foto = $lala[1];
		$disco = $lala[2];
	}

	$removeFile = "rm /musica/$archivo";
	system($removeFile);
	
	$queryCancion = "delete from musica_canciones where id='$codigo'";
	$qCancion = mysqli_query($con, $queryCancion);
	$queryLista = "delete from musica_lista where codigo='$codigo'";
	$qLista = mysqli_query($con, $queryLista);
	
	$queryChequeo = "select count(disco) from musica_canciones where disco=$disco";
	$qChequeo = mysqli_query($con, $queryChequeo);
	while($lxlx = mysqli_fetch_array($qChequeo)) { $total = $lxlx[0]; }
	if ($total == 0)
	{
		$removeFoto = "rm /musica/pics/$foto";
		system($removeFoto);
		$queryDisco = "delete from musica_discos where id=$disco";
		$qDisco = mysqli_query($con, $queryDisco);
	}

	header('location: ../../../musica.php?t=' . $t . '&app=1&id=1');
?>
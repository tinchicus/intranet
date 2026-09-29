<?php
	if (isset($_REQUEST["token"])) { $token=$_REQUEST["token"]; } else { $token=""; }
	if (isset($_REQUEST["tipo"])) { $tipo=$_REQUEST["tipo"]; } else { $tipo=""; }
	if (isset($_REQUEST["titulo"])) { $titulo=$_REQUEST["titulo"]; } else { $titulo=""; }
	if (isset($_REQUEST["genero"])) { $genero=$_REQUEST["genero"]; } else { $genero=""; }
	if (isset($_REQUEST["archivo-lista"])) { $archivos=$_REQUEST["archivo-lista"]; } else { $archivos=""; }
	if (isset($_FILES["foto"]["tmp_name"])) { $foto=$_FILES["foto"]["tmp_name"]; } else { $foto=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	$archivos = substr($archivos,0,strlen($archivos)-1);
	
	$queryUser = "select usuario from usuarios where token_tools = '$token'";
	$qUser = mysqli_query($con, $queryUser);
	while($lala = mysqli_fetch_array($qUser)) { $user = $lala[0]; }

	$queryCodigo = "select codigo from musica_playlists order by codigo desc limit 1";
	$qCodigo = mysqli_query($con, $queryCodigo);
	while($lala = mysqli_fetch_array($qCodigo)) { $codex = $lala[0]; }
	if (!$codex) { $codex = "PL100000000"; } else { $codex++; }

	$arreglo = explode(",", $archivos);
	if ($foto) {
		move_uploaded_file($foto,"/musica/pics/" . $codex);
		$foto = $codex;
	} else {
		$queryFoto = "select foto from musica_canciones where archivo='$arreglo[0]'";
		$qFoto = mysqli_query($con, $queryFoto);
		while ($lele = mysqli_fetch_array($qFoto)) { $foto = $lele[0]; }
	}

	$track = 1;
	foreach($arreglo as $a) 
	{
		$queryLista="insert into musica_playlists values (NULL, '$codex', '$titulo', '$foto', '$a', $track, '$tipo', '$genero', NOW(), NOW(), '$user')";
		$qLista = mysqli_query($con, $queryLista);
		$track++;		
	}

	$queryLimpiar = "update sesiones set codigo=NULL where token='$token'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);
	
	header('location: ../../../musica.php?t=' . $token . '&app=1&id=2');
?>	
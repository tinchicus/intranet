<?php
	if (isset($_REQUEST["token"])) { $token=$_REQUEST["token"]; } else { $token=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	if (isset($_REQUEST["artista"])) { $artista=$_REQUEST["artista"]; } else { $artista=""; }
	if (isset($_REQUEST["artista2"])) { $artista2=$_REQUEST["artista2"]; } else { $artista2=""; }
	if (isset($_REQUEST["artista_cnc"])) { $artista_cnc=$_REQUEST["artista_cnc"]; } else { $artista_cnc=""; }
	if (isset($_REQUEST["titulo"])) { $titulo=$_REQUEST["titulo"]; } else { $titulo=""; }
	if (isset($_REQUEST["titulo_cnc"])) { $titulo_cnc=$_REQUEST["titulo_cnc"]; } else { $titulo_cnc=""; }
	if (isset($_REQUEST["track_cnc"])) { $tracks=$_REQUEST["track_cnc"]; } else { $tracks=""; }
	if (isset($_REQUEST["genero"])) { $genero=$_REQUEST["genero"]; } else { $genero=""; }
	if (isset($_REQUEST["genero2"])) { $genero2=$_REQUEST["genero2"]; } else { $genero2=""; }
	if (isset($_REQUEST["pais"])) { $pais=$_REQUEST["pais"]; } else { $pais=""; }
	if (isset($_REQUEST["pais2"])) { $pais2=$_REQUEST["pais2"]; } else { $pais2=""; }
	if (isset($_REQUEST["ano"])) { $ano=$_REQUEST["ano"]; } else { $ano=""; }
	if (isset($_FILES["foto"]["tmp_name"])) { $foto=$_FILES["foto"]["tmp_name"]; } else { $foto=""; }

	include("intranet.inc");
	$con=base_connect("intranet");
	
	$queryUser = "select usuario from usuarios where token_tools = '$token'";
	$qUser = mysqli_query($con, $queryUser);
	while($lala = mysqli_fetch_array($qUser)) { $user = $lala[0]; }

	if ($foto)
	{
		move_uploaded_file($foto,"/musica/pics/" . $codigo);
		$queryFoto = "update musica_discos  set foto=$codigo where id=$codigo";
		$qFoto = mysqli_query($con, $queryFoto);
		$queryFoto = "update musica_canciones  set foto=$codigo where disco=$codigo";
		$qFoto = mysqli_query($con, $queryFoto);
		$queryFoto = "update musica_lista  set foto=$codigo where codigo=$codigo";
		$qFoto = mysqli_query($con, $queryFoto);		
	}

	$queryDisco = "update musica_discos set artista='$artista', titulo='$titulo', genero='$genero', pais='$pais', ano=$ano, modificado=NOW() where id=$codigo";
	$qDisco = mysqli_query($con, $queryDisco);
	
	for($i=0; $i < count($tracks); $i++)
	{
		$queryTracks = "update musica_canciones set titulo='" . htmlspecialchars($titulo_cnc[$i]) . "' where disco=$codigo and track=$tracks[$i]";
		$qTracks = mysqli_query($con, $queryTracks);		
	}

	$queryLimpiar = "update sesiones set codigo=NULL,filtro1_musica=NULL where token='$token'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);
	
	header('location: ../../../musica.php?t=' . $token . '&app=1&id=0');

?>
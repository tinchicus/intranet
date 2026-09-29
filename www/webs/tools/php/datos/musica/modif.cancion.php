<?php
	if (isset($_REQUEST["token"])) { $token=$_REQUEST["token"]; } else { $token=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	if (isset($_REQUEST["artista"])) { $artista=$_REQUEST["artista"]; } else { $artista=""; }
	if (isset($_REQUEST["artista2"])) { $artista2=$_REQUEST["artista2"]; } else { $artista2=""; }
	if (isset($_REQUEST["titulo"])) { $titulo=$_REQUEST["titulo"]; } else { $titulo=""; }
	if (isset($_REQUEST["album"])) { $album=$_REQUEST["album"]; } else { $album=""; }
	if (isset($_REQUEST["album2"])) { $album2=$_REQUEST["album2"]; } else { $album2=""; }
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

	if ($foto && $album!="nuevo")
	{
		move_uploaded_file($_FILES["foto"]["tmp_name"],"/musica/pics/" . $album);
		$queryFoto = "update musica_canciones set foto=$album where id=$codigo";
		$qFoto = mysqli_query($con, $queryFoto);
		$queryFoto = "update musica_discos set foto=$album where id=$album";
		$qFoto = mysqli_query($con, $queryFoto);
		$queryFoto = "update musica_lista set foto=$album where codigo=$codigo";
		$qFoto = mysqli_query($con, $queryFoto);
	}

	if ($album == "nuevo")
	{
		$queryId="select id from musica_discos order by id desc limit 1";
		$qId = mysqli_query($con, $queryId);
		while($lele = mysqli_fetch_array($qId)) { $id_disco = $lele[0]; }
		if ($id_disco=="") { $id_disco=10000000; } else { $id_disco++; }
			
		if ($_FILES["foto"]["tmp_name"]) {
			move_uploaded_file($_FILES["foto"]["tmp_name"],"/musica/pics/" . $id_disco);
			$foto = $id_disco;
		} else {
			$foto = 0;
		}
	
		if ($artista=="nuevo") $artista=$artista2;
		if ($album=="nuevo") $album=$id_disco;
		if ($pais=="nuevo") $pais=$pais2;
		if ($genero=="nuevo") $genero=$genero2;
						
		$queryDisco="insert into musica_discos values ($album, '$artista','$album2','$pais','$ano','$genero',$foto,NOW(),NOW(),'$user')";
		$qDisco=mysqli_query($con, $queryDisco);
	}

	if ($pais=="nuevo") $pais=$pais2;
	if ($genero=="nuevo") $genero=$genero2;
	
	$queryCambiar = "update musica_canciones set artista='$artista', titulo='$titulo',disco='$album',genero='$genero',pais='$pais',ano='$ano',modificado=NOW(),creador='$user' where id=$codigo";
	$qCambiar = mysqli_query($con, $queryCambiar);
	
	$queryLista = "update musica_lista set artista='$artista', titulo='$titulo',genero='$genero',pais='$pais',ano='$ano',creador='$user' where codigo=$codigo";
	$qCambiar = mysqli_query($con, $queryLista);
	
	$queryLimpiar = "update sesiones set codigo=NULL, filtro1_musica=NULL where token='$token'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);
	
	header('location: ../../../musica.php?t=' . $token . '&app=1&id=1');	
?>
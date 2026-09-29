<?php
	if (isset($_REQUEST["token"])) { $token=$_REQUEST["token"]; } else { $token=""; }
	if (isset($_REQUEST["id"])) { $id=$_REQUEST["id"]; } else { $id=""; }
	if (isset($_REQUEST["artista"])) { $artista=$_REQUEST["artista"]; } else { $artista=""; }
	if (isset($_REQUEST["artista2"])) { $artista2=$_REQUEST["artista2"]; } else { $artista2=""; }
	if (isset($_REQUEST["artista_cnc"])) { $artista_cnc=$_REQUEST["artista_cnc"]; } else { $artista_cnc=""; }
	if (isset($_REQUEST["titulo"])) { $titulo=$_REQUEST["titulo"]; } else { $titulo=""; }
	if (isset($_REQUEST["titulo_cnc"])) { $titulo_cnc=$_REQUEST["titulo_cnc"]; } else { $titulo_cnc=""; }
	if (isset($_REQUEST["genero"])) { $genero=$_REQUEST["genero"]; } else { $genero=""; }
	if (isset($_REQUEST["genero2"])) { $genero2=$_REQUEST["genero2"]; } else { $genero2=""; }
	if (isset($_REQUEST["pais"])) { $pais=$_REQUEST["pais"]; } else { $pais=""; }
	if (isset($_REQUEST["pais2"])) { $pais2=$_REQUEST["pais2"]; } else { $pais2=""; }
	if (isset($_REQUEST["ano"])) { $ano=$_REQUEST["ano"]; } else { $ano=""; }
	if (isset($_FILES["foto"]["tmp_name"])) { $foto=$_FILES["foto"]["tmp_name"]; } else { $foto=""; }
	if (isset($_FILES["archivo_cnc"]["tmp_name"])) { $archi=$_FILES["archivo_cnc"]["tmp_name"]; } else { $archi=""; } 
	
	include("intranet.inc");
	$con=base_connect("intranet");
		
	$queryUser = "select usuario from usuarios where token_tools = '$token'";
	$qUser = mysqli_query($con, $queryUser);
	while($lala = mysqli_fetch_array($qUser)) { $user = $lala[0]; }

	$queryCodigo = "select id from musica_discos order by id desc limit 1";
	$qCodigo = mysqli_query($con, $queryCodigo);
	while($lala = mysqli_fetch_array($qCodigo)) { $id_disco = $lala[0]; }
	
	if (!$id_disco)
		$id_disco = 10000000;
	else
		$id_disco++;
		
	if ($pais == "nuevo") $pais = $pais2;
	if ($genero == "nuevo") $genero = $genero2;
	if ($artista == "nuevo") $artista = $artista2;
	
	if ($foto)
	{
		move_uploaded_file($foto,"/musica/pics/" . $id_disco);
		$foto = $id_disco;
	} else {
		$foto = 0;
	}

	$queryDisco = "insert into musica_discos values ($id_disco, '$artista', '$titulo', '$pais', $ano, '$genero', '$foto', NOW(), NOW(), '$user')";
	$qDisco = mysqli_query($con, $queryDisco);

	$queryCodigo="select id from musica_canciones order by id desc limit 1";
	$qCodigo=mysqli_query($con, $queryCodigo);
	while($lili=mysqli_fetch_array($qCodigo)) { $id_cancion = $lili[0]; }
		
	if ($id_cancion=="") { $id_cancion=100000000; } else { $id_cancion++; }

	$nombre_cnc = $_FILES["archivo_cnc"]["name"];
	for($i = 0; $i < count($archi); $i++)
	{
		if ($archi[$i])
		{
			move_uploaded_file($archi[$i],"/musica/temporal/" . $nombre_cnc[$i]);
			if ($artista != "Varios")
				$linea="ffmpeg -i \"/musica/temporal/$nombre_cnc[$i]\" -metadata title=\"$titulo_cnc[$i]\" -metadata album_artist=\"$artista\" -metadata genre=\"$genero\" -metadata date=$ano -metadata album=\"$titulo\" -acodec libmp3lame -ar 44100 -ab 160k /musica/$id_cancion.mp3;ls -l /musica/$id_cancion.mp3 > /musica/temporal/$id_cancion.txt";
			else
				$linea="ffmpeg -i \"/musica/temporal/$nombre_cnc[$i]\" -metadata title=\"$titulo_cnc[$i]\" -metadata album_artist=\"$artista_cnc[$i]\" -metadata genre=\"$genero\" -metadata date=$ano -metadata album=\"$titulo\" -acodec libmp3lame -ar 44100 -ab 160k /musica/$id_cancion.mp3;ls -l /musica/$id_cancion.mp3 > /musica/temporal/$id_cancion.txt";
			system($linea);
			system("rm \"/musica/temporal/" . $nombre_cnc[$i] . "\"");
		
			$queryTrack = "select track from musica_canciones where disco = $id_disco order by track desc limit 1";
			$qTrack = mysqli_query($con, $queryTrack);
			while($linea = mysqli_fetch_array($qTrack)) { $track = $linea[0]; }
		
			if (!$track) $track = 1; else $track++;

			if ($artista != "Varios")
				$queryCancion="insert into musica_canciones values ($id_cancion, '" . htmlspecialchars($artista, ENT_QUOTES) . "','" . htmlspecialchars($titulo_cnc[$i], ENT_QUOTES) . "','$pais','$genero','$ano',$id_disco,'al',$track,'$foto','$id_cancion.mp3', NOW(), NOW(), '$user')";
			else
				$queryCancion="insert into musica_canciones values ($id_cancion, '" . htmlspecialchars($artista_cnc[$i], ENT_QUOTES) . "','" . htmlspecialchars($titulo_cnc[$i], ENT_QUOTES) . "','$pais','$genero','$ano',$id_disco,'al',$track,'$foto','$id_cancion.mp3', NOW(), NOW(), '$user')";

			$qCancion=mysqli_query($con, $queryCancion);
			$id_cancion++;
		}
	}	
	system("rm /musica/temporal/*.txt");
	$queryUltimo="select id from musica_lista order by id desc limit 1";
	$qUltimo=mysqli_query($con, $queryUltimo);
	while($lolo=mysqli_fetch_array($qUltimo)) { $ultimo = $lolo[0]; }
	if (!$ultimo) { $ultimo = 1; } else { $ultimo++; }
			
	$queryLista="insert into musica_lista values ($ultimo, $id_disco, 'al', '$artista', '$titulo', '$pais', '$ano', $foto, '$genero', NOW(), '$user')";
	echo $queryLista . "<br>";
	$qLista=mysqli_query($con, $queryLista); 

	$queryLimpiar = "update sesiones set codigo=NULL where token='$token'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);
	
	header('location: ../../../musica.php?t=' . $token . '&app=1&id=0');
?>	
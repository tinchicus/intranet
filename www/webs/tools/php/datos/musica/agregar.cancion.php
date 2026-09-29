<?php
	if (isset($_REQUEST["token"])) { $token=$_REQUEST["token"]; } else { $token=""; }
	if (isset($_REQUEST["id"])) { $id=$_REQUEST["id"]; } else { $id=""; }
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
	if (isset($_FILES["archivo"]["name"])) { $archi=$_FILES["archivo"]["name"]; } else { $archi=""; } 
	
	include("intranet.inc");
	$con=base_connect("intranet");
		
	$queryUser = "select usuario from usuarios where token_tools = '$token'";
	$qUser = mysqli_query($con, $queryUser);
	while($lala = mysqli_fetch_array($qUser)) { $user = $lala[0]; }

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
		if ($pais=="nuevo") $pais=$pais2;
		if ($genero=="nuevo") $genero=$genero2;
		if ($album=="nuevo") $album=$id_disco;
						
		$queryDisco="insert into musica_discos values ($album, '" . htmlspecialchars($artista, ENT_QUOTES) . "','" . htmlspecialchars($album2, ENT_QUOTES) . "','$pais','$ano','$genero',$foto,NOW(),NOW(),'$user')";
		$qDisco=mysqli_query($con, $queryDisco);
	} else {
		$queryFoto = "select foto from musica_discos where id=$album";
		$qFoto = mysqli_query($con, $queryFoto);
		while ($lxlx = mysqli_fetch_array($qFoto)) { $foto = $lxlx[0]; }	
	}

	if ($genero=="nuevo") $genero=$genero2;
		
	$queryCodigo="select id from musica_canciones order by id desc limit 1";
	$qCodigo=mysqli_query($con, $queryCodigo);
	while($lili=mysqli_fetch_array($qCodigo)) { $id_cancion = $lili[0]; }
		
	if ($id_cancion=="") { $id_cancion=100000000; } else { $id_cancion++; }
		
	$tempo=$_FILES["archivo"]["tmp_name"];
	move_uploaded_file($tempo,"/musica/temporal/" . $archi);
	$linea="ffmpeg -i \"/musica/temporal/$archi\" -metadata title=\"$titulo\" -metadata album_artist=\"$artista\" -metadata genre=\"$genero\" -metadata date=$ano -metadata album=\"$album\" -acodec libmp3lame -ar 44100 -ab 160k /musica/$id_cancion.mp3;ls -l /musica/$id_cancion.mp3 > /musica/temporal/$id_cancion.txt";
	//echo $linea . "<br>";
	system($linea);
	/* 
	Esta seccion la dejo por si quieren llevar un log de los archivos subidos, la deshabilite porque me trajo algunos inconvenientes.
	
	$txt="/musica/temporal/$id_cancion.txt";
	$gestion=fopen($txt,"r");
	$log=fread($gestion,filesize($txt));
	fclose($gestion);
	$queryLog="insert into musica_log values (NULL,'$log','ar',NOW(),'tinchicus')";
	$qLog=mysqli_query($con,$queryLog); */
	system("rm \"/musica/temporal/$archi\"");

	$queryCancion="insert into musica_canciones values ($id_cancion, '" . htmlspecialchars($artista, ENT_QUOTES) . "','$titulo','$pais','$genero','$ano',$album,'ar',1,$foto,'$id_cancion.mp3', NOW(), NOW(), '$user')";
	echo $queryCancion . "<br>";
	$qCancion=mysqli_query($con, $queryCancion);
		
	$queryUltimo="select id from musica_lista order by id desc limit 1";
	$qUltimo=mysqli_query($con, $queryUltimo);
	while($lolo=mysqli_fetch_array($qUltimo)) { $ultimo = $lolo[0]; }
	if ($ultimo=="") { $ultimo = 1; } else { $ultimo++; }
			
	$queryLista="insert into musica_lista values ($ultimo, $id_cancion, 'ar', '" . htmlspecialchars($artista, ENT_QUOTES) . "', '" . htmlspecialchars($titulo, ENT_QUOTES) . "', '$pais', '$ano', $foto, '$genero', NOW(), '$user')";
	$qLista=mysqli_query($con, $queryLista); 
	
	$queryLimpiar = "update sesiones set codigo=NULL where token='$token'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);
	
	header('location: ../../../musica.php?t=' . $token . '&app=1&id=1');
	
		
?>
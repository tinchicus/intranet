<?php
	if (isset($_REQUEST["token"])) { $token=$_REQUEST["token"]; } else { $token=""; }
	if (isset($_REQUEST["id"])) { $id=$_REQUEST["id"]; } else { $id=""; }
	if (isset($_REQUEST["tipo"])) { $tipo=$_REQUEST["tipo"]; } else { $tipo=""; }
	if (isset($_REQUEST["cantidad"])) { $cantidad=$_REQUEST["cantidad"]; } else { $cantidad=20; }
	if (isset($_REQUEST["artista"])) { $artista=$_REQUEST["artista"]; } else { $artista=""; }
	if (isset($_REQUEST["artista2"])) { $artista2=$_REQUEST["artista2"]; } else { $artista2=""; }
	if (isset($_REQUEST["artista_cnc"])) { $artista_cnc=$_REQUEST["artista_cnc"]; } else { $artista_cnc=array_fill(0,$cantidad,NULL); }
	if (isset($_REQUEST["titulo"])) { $titulo=$_REQUEST["titulo"]; } else { $titulo=""; }
	if (isset($_REQUEST["titulo_cnc"])) { $titulo_cnc=$_REQUEST["titulo_cnc"]; } else { $titulo_cnc=array_fill(0,$cantidad,NULL); }
	if (isset($_REQUEST["track_lst"])) { $track_lst=$_REQUEST["track_lst"]; } else { $track_lst=""; }
	if (isset($_REQUEST["track_dat"])) { $track_dat=$_REQUEST["track_dat"]; } else { $track_dat=""; }
	if (isset($_REQUEST["track_cnc"])) { $track_cnc=$_REQUEST["track_cnc"]; } else { $track_cnc=array_fill(0,$cantidad,NULL); }
	if (isset($_REQUEST["album"])) { $album=$_REQUEST["album"]; } else { $album=""; }
	if (isset($_REQUEST["album2"])) { $album2=$_REQUEST["album2"]; } else { $album2=""; }
	if (isset($_REQUEST["genero"])) { $genero=$_REQUEST["genero"]; } else { $genero=""; }
	if (isset($_REQUEST["genero2"])) { $genero2=$_REQUEST["genero2"]; } else { $genero2=""; }
	if (isset($_REQUEST["pais"])) { $pais=$_REQUEST["pais"]; } else { $pais=""; }
	if (isset($_REQUEST["pais2"])) { $pais2=$_REQUEST["pais2"]; } else { $pais2=""; }
	if (isset($_REQUEST["ano"])) { $ano=$_REQUEST["ano"]; } else { $ano=""; }
	if (isset($_REQUEST["foto_p"])) { $foto_p=$_REQUEST["foto_p"]; } else { $foto_p=""; }
	if (isset($_FILES["foto"]["tmp_name"])) { $foto=$_FILES["foto"]["tmp_name"]; } else { $foto=""; }
	
	if ($sesion->tipo == "ar" && !$artista && !$titulo && !$album && !$genero && !$pais && !$ano)
	{
		$queryDatos = "select artista, titulo, disco, genero, pais, ano, foto from musica_canciones where id=" . $sesion->id;
		$qDatos = mysqli_query($con, $queryDatos);
		while($lala = mysqli_fetch_array($qDatos))
		{
			$artista = $lala[0];
			$titulo = $lala[1];
			$album = $lala[2];
			$genero = $lala[3];
			$pais = $lala[4];
			$ano = $lala[5];
			$foto_p = $lala[6];
		}
	}
	
	if ($sesion->tipo == "al" && !$artista && !$titulo && !$genero && !$pais && !$ano)
	{
		$queryDatos = "select artista, titulo, genero, pais, ano, foto from musica_discos where id=" . $sesion->id;
		$qDatos = mysqli_query($con, $queryDatos);
		while($lala = mysqli_fetch_array($qDatos))
		{
			$artista = $lala[0];
			$titulo = $lala[1];
			$genero = $lala[2];
			$pais = $lala[3];
			$ano = $lala[4];
			$foto_p = $lala[5];
		}
		
		$l = 0;
		$canciones = Array();
		$queryCanciones = "select artista, titulo, track from musica_canciones where disco=" . $sesion->id . " order by track asc";
		$qCanciones = mysqli_query($con, $queryCanciones);
		while($lele = mysqli_fetch_array($qCanciones))
		{
			$cancion[$l] = new Datos();
			$cancion[$l]->artista = $lele[0];
			$cancion[$l]->titulo = $lele[1];
			$cancion[$l]->track = $lele[2];
			array_push($canciones, $cancion[$l]);
			$l++;
		}
	}

	if ($sesion->tipo == "pl" && !$titulo && !$genero && !$tipo)
	{
		$queryDatos = "select titulo, foto, tipo, genero from musica_playlists where codigo='" . $sesion->id . "'";
		$qDatos = mysqli_query($con, $queryDatos);
		while($lala = mysqli_fetch_array($qDatos))
		{
			$titulo = $lala[0];
			$foto_p = $lala[1];
			$tipo = $lala[2];
			$genero = $lala[3];
		}
		
		$l = 0;
		$track_lst = Array();
		$track_dat = Array();
		$queryCanciones = "select archivo from musica_playlists where codigo='" . $sesion->id . "'";
		$qCanciones = mysqli_query($con, $queryCanciones);
		while($lele = mysqli_fetch_array($qCanciones))
		{
			$cancion[$l] = new Datos();
			$cancion[$l]->archivo = $lele[0];
			$queryDatos = "select artista, titulo from musica_canciones where archivo='" . $cancion[$l]->archivo . "'";
			$qDatos = mysqli_query($con, $queryDatos);
			while($lili = mysqli_fetch_array($qDatos))
			{
				$cancion[$l]->artista = $lili[0];
				$cancion[$l]->titulo = $lili[1];
			}
			$cancion[$l]->omitir = "no";
			$archivo[$l] = $cancion[$l]->archivo . ";" . $cancion[$l]->omitir; 
			$datos_pl[$l] = $cancion[$l]->artista . " - " . $cancion[$l]->titulo;
			array_push($track_lst, $archivo[$l]);
			array_push($track_dat, $datos_pl[$l]);
			$l++;
		}
	}

	$l=0;
	$generos = Array();
	if ($artista)
	{
		switch($artista)
		{
			case "Varios":
			case "nuevo":
				$queryGenero = "select distinct genero from musica_discos order by genero asc";
				break;
			default:
				$queryGenero = "select distinct genero from musica_discos where artista='$artista' order by genero asc";
				break;
		}
		
		$qGenero = mysqli_query($con, $queryGenero);
		while($lele = mysqli_fetch_array($qGenero))
		{
			$genero_l[$l]= new Datos();
			$genero_l[$l]->genero = $lele[0];
			array_push($generos, $genero_l[$l]);
			$l++;
		}
	}

	$l=0;
	$paises = Array();
	$queryPais = "select distinct pais from musica_discos order by pais asc";
	$qPais = mysqli_query($con, $queryPais);
	while($lili = mysqli_fetch_array($qPais))
	{
		$pais_l[$l]= new Datos();
		$pais_l[$l]->pais = $lili[0];
		array_push($paises, $pais_l[$l]);
		$l++;
	}
	
	$l = 0;
	$albums = Array();
	if ($artista)
	{
		$queryAlbum = "select distinct id, titulo from musica_discos where artista = '$artista' order by id asc";
		$qAlbum = mysqli_query($con, $queryAlbum);
		while($lolo = mysqli_fetch_array($qAlbum))
		{
			$disco[$l] = new Datos();
			$disco[$l]->id_disco = $lolo[0];
			$disco[$l]->tit_disco = $lolo[1];
			array_push($albums, $disco[$l]);
			$l++;
		}
	}
	
	if ($artista != "" && $album != "")
	{
		$anio = 0;
		$queryAno = "select ano from musica_discos where artista='$artista' and id='$album'";
		$qAno = mysqli_query($con, $queryAno);
		while($lulu = mysqli_fetch_array($qAno)) { $anio = $lulu[0]; }
		
		if ($anio) { $ano = $anio; }
	}

	if ($sesion->tipo == "pl")
	{
		$l = 0;
		$listado = Array();
		$queryLista = "select artista,titulo,archivo from musica_canciones order by id asc";
		$qLista = mysqli_query($con, $queryLista);
		while($lolo = mysqli_fetch_array($qLista))
		{
			$cancion[$l] = new Datos();
			$cancion[$l]->artista = $lolo[0];
			$cancion[$l]->titulo = $lolo[1];
			$cancion[$l]->archivo = $lolo[2];
			array_push($listado, $cancion[$l]);
			$l++;
		}
	}
	
?>
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
	if (isset($_REQUEST["album"])) { $album=$_REQUEST["album"]; } else { $album=""; }
	if (isset($_REQUEST["album2"])) { $album2=$_REQUEST["album2"]; } else { $album2=""; }
	if (isset($_REQUEST["genero"])) { $genero=$_REQUEST["genero"]; } else { $genero=""; }
	if (isset($_REQUEST["genero2"])) { $genero2=$_REQUEST["genero2"]; } else { $genero2=""; }
	if (isset($_REQUEST["pais"])) { $pais=$_REQUEST["pais"]; } else { $pais=""; }
	if (isset($_REQUEST["pais2"])) { $pais2=$_REQUEST["pais2"]; } else { $pais2=""; }
	if (isset($_REQUEST["ano"])) { $ano=$_REQUEST["ano"]; } else { $ano=""; }
	if (isset($_FILES["foto"]["tmp_name"])) { $foto=$_FILES["foto"]["tmp_name"]; } else { $foto=""; }
	if (isset($_FILES["archivo"]["name"])) { $archi=$_FILES["archivo"]["name"]; } else { $archi=""; } 

	switch($id)
	{
		case "1":
			$queryLista = "select codigo, artista, titulo, foto, tipo from musica_lista where tipo='ar' order by codigo desc";
			break;
		case "2":
			$queryLista = "select distinct codigo, 'tipo-pl', titulo, foto, 'pl' from musica_playlists order by codigo desc";
			break;
		default:
			$id=0;
			$queryLista = "select codigo, artista, titulo, foto, tipo from musica_lista where tipo='al' order by codigo desc";
			break;
	}

	$l=0;
	$listado = Array();
	$qLista = mysqli_query($con, $queryLista);
	while($lala = mysqli_fetch_array($qLista))
	{
		$objeto[$l] = new Datos();
		$objeto[$l]->id = $lala[0];
		$objeto[$l]->artista = $lala[1];
		$objeto[$l]->titulo = $lala[2];
		$objeto[$l]->foto = $lala[3];
		$objeto[$l]->tipo = $lala[4];
		array_push($listado, $objeto[$l]);
		$l++;
	}

	$l=0;
	$artistas = Array();
	$queryArtista = "select distinct artista from musica_discos order by artista asc";
	$qArtista = mysqli_query($con, $queryArtista);
	while($lala = mysqli_fetch_array($qArtista))
	{
		$artista_l[$l] = new Datos();
		$artista_l[$l]->artista = $lala[0];
		if ($artista_l[$l]->artista != "Varios") array_push($artistas, $artista_l[$l]);
		$l++;
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
	if ($artista)
	{
		switch($artista)
		{
			case "Varios":
			case "nuevo":
				$queryPais = "select distinct pais from musica_discos order by pais asc";
				$qPais = mysqli_query($con, $queryPais);
				while($lili = mysqli_fetch_array($qPais))
				{
					$pais_l[$l]= new Datos();
					$pais_l[$l]->pais = $lili[0];
					array_push($paises, $pais_l[$l]);
					$l++;
				}
				break;
			default:
				$queryPais = "select distinct pais from musica_discos where artista='$artista'";
				$qPais = mysqli_query($con, $queryPais);
				while($lili = mysqli_fetch_array($qPais))
				{
					$pais_l[$l]= new Datos();
					$pais_l[$l]->pais = $lili[0];
					array_push($paises, $pais_l[$l]);
					$l++;
				}
				$pais = $paises[0]->pais;
				break;						
		}
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

	if (count($titulo_cnc) < $cantidad)
	{
		for($i = count($titulo_cnc); $i < $cantidad; $i++)
		{
			$titulo_cnc[$i] = NULL;
			if ($artista_cnc) $artista_cnc[$i] = NULL;
		}
	}
	
	$g = 0;
	$generos_pl = Array();
	$queryGenerosPL = "select distinct genero from musica_discos order by genero asc";
	$qGenPl = mysqli_query($con, $queryGenerosPL);
	while($lyly = mysqli_fetch_array($qGenPl))
	{
		$genero_pl[$g]= new Datos();
		$genero_pl[$g]->genero = $lyly[0];
		array_push($generos_pl, $genero_pl[$g]);
		$g++;		
	}
	
	$l = 0;
	$listado_pl = Array();
	$queryListado = "select artista,titulo,archivo from musica_canciones order by id asc";
	$qListado = mysqli_query($con, $queryListado);
	while($lxlx = mysqli_fetch_array($qListado))
	{
		$cancion_pl[$l] =  new Datos();
		$cancion_pl[$l]->artista = $lxlx[0];
		$cancion_pl[$l]->titulo = $lxlx[1];
		$cancion_pl[$l]->archivo = $lxlx[2];
		array_push($listado_pl, $cancion_pl[$l]);
		$l++;
	}
?>
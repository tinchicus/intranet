<?php
	$con=base_connect("intranet");
	
	$frases = Array();
	$f = 0;
	$queryFrases = "select id_autor,texto from frases order by creado desc";
	$qFrases = mysqli_query($con, $queryFrases);
	while($lala = mysqli_fetch_array($qFrases))
	{
		$frase[$f] = new Datos();
		$id = $lala[0];
		$frase[$f]->texto = $lala[1];
		$queryAutor = "select nombre, apellido, foto from frases_autor where codigo='$id'";
		$qAutor = mysqli_query($con, $queryAutor);
		while($lele = mysqli_fetch_array($qAutor)) 
		{
			$frase[$f]->autor = $lele[0] . " " . $lele[1];
			$frase[$f]->foto = $lele[2];
		}
		array_push($frases, $frase[$f]);
		$f++;
	}

	$videos = Array();
	$v=0;
	$queryVideos="select foto from videos_lista where seccion != 'series' order by codigo desc limit 4";
	$qVideos = mysqli_query($con, $queryVideos);
	while($lele = mysqli_fetch_array($qVideos))
	{
		$video[$v] = new Datos();
		$video[$v]->foto = $lele[0];
		array_push($videos, $video[$v]);
		$v++;
	}
	
	$musica = new Datos();
	$queryMusica = "select foto from musica_lista order by creado desc limit 1";
	$qMusica = mysqli_query($con, $queryMusica);
	while ($lala = mysqli_fetch_array($qMusica)) $musica->foto = $lala[0];

	$nov_site = Array();
	$s = 0;
	$querySitio = "select fecha, texto from news where tipo='Sitio' order by creado desc";
	$qSitio = mysqli_query($con, $querySitio);
	while($linea=mysqli_fetch_array($qSitio))
	{
		$news[$s] = new Datos();
		$news[$s]->fecha = $linea[0];
		$news[$s]->texto = $linea[1];
		array_push($nov_site, $news[$s]);
		$s++;
	}
	$nov_mus = Array();
	$m = 0;
	$queryMusica = "select fecha, texto from news where tipo='Musica' order by creado desc";
	$qMusica = mysqli_query($con, $queryMusica);
	while($linea=mysqli_fetch_array($qMusica))
	{
		$news[$m] = new Datos();
		$news[$m]->fecha = $linea[0];
		$news[$m]->texto = $linea[1];
		array_push($nov_mus, $news[$m]);
		$m++;
	}
	$nov_vid = Array();
	$v = 0;
	$queryVideos = "select fecha, texto from news where tipo='Videos' order by creado desc";
	$qVideos = mysqli_query($con, $queryVideos);
	while($linea=mysqli_fetch_array($qVideos))
	{
		$news[$v] = new Datos();
		$news[$v]->fecha = $linea[0];
		$news[$v]->texto = $linea[1];
		array_push($nov_vid, $news[$v]);
		$v++;
	}
	
	$listas = Array();
	$l=0;
	$queryListas = "select distinct codigo,titulo,foto from musica_playlists order by creado desc";
	$qListas = mysqli_query($con, $queryListas);
	while($lxlx = mysqli_fetch_array($qListas))
	{
		$lista[$l] = new Datos();
		$lista[$l]->codex = $lxlx[0];
		$lista[$l]->titulo = $lxlx[1];
		$lista[$l]->foto = $lxlx[2];
		$lista[$l]->tipo = "pl";
		array_push($listas, $lista[$l]);
		$l++;
	}
	$queryListas = "select codigo,titulo,artista,foto,tipo from musica_lista where tipo='al' order by creado desc";
	$qListas = mysqli_query($con, $queryListas);
	while($lyly = mysqli_fetch_array($qListas))
	{
		$lista[$l] = new Datos();
		$lista[$l]->codex = $lyly[0];
		$lista[$l]->titulo = $lyly[1];
		$lista[$l]->artista = $lyly[2];
		$lista[$l]->foto = $lyly[3];
		$lista[$l]->tipo = $lyly[4];
		array_push($listas, $lista[$l]);
		$l++;
	}
?>
<?php
	$con = base_connect("intranet");
	
	$filtro = new Filtros();
	$queryFiltro = "select filtro1_musica, filtro2_musica from sesiones where token='$t'";
	$qFiltro = mysqli_query($con, $queryFiltro);
	while($lele = mysqli_fetch_array($qFiltro)) {
		$filtro->filtro1 = $lele[0];
		$filtro->filtro2 = $lele[1];
	}
		
	$listado = Array();
	$l = 0;
	switch($filtro->filtro1)
	{
		case "canciones":
			$queryListado = "select codigo,artista,titulo,foto,genero,tipo from musica_lista where tipo='ar' order by codigo desc";			
			break;
		case "discos":
			$queryListado = "select codigo,artista,titulo,foto,genero,tipo from musica_lista where tipo='al' order by codigo desc";			
			break;
		case "listas":
			$queryListado = "select distinct codigo,NULL,titulo,foto,genero,'pl' from musica_playlists order by codigo desc";
			break;
		case "genero":
		case "artista":
		case "pais":
		case "ano":
			$queryListado = "select codigo,artista,titulo,foto,genero,tipo from musica_lista where $filtro->filtro1='$filtro->filtro2' order by creado desc";
			break;
		default:
			$queryListado = "select distinct codigo,NULL,titulo,foto,genero,'pl' from musica_playlists order by codigo desc";
			$qListado = mysqli_query($con, $queryListado);
			while($lala=mysqli_fetch_array($qListado))
			{
				$lista[$l] = new Datos();
				$lista[$l]->codigo = $lala[0];
				$lista[$l]->artista = $lala[1];
				$lista[$l]->titulo = $lala[2];
				$lista[$l]->foto = $lala[3];
				$lista[$l]->genero = $lala[4];
				$lista[$l]->tipo = $lala[5];
				array_push($listado, $lista[$l]);
				$l++;
			}
			$queryListado = "select codigo,artista,titulo,foto,genero,tipo from musica_lista order by creado desc";
			break;
	}

	$qListado = mysqli_query($con, $queryListado);
	while($lele = mysqli_fetch_array($qListado))
	{
		$lista[$l] = new Datos();
		$lista[$l]->codigo = $lele[0];
		$lista[$l]->artista = $lele[1];
		$lista[$l]->titulo = $lele[2];
		$lista[$l]->foto = $lele[3];
		$lista[$l]->genero = $lele[4];
		$lista[$l]->tipo = $lele[5];
		array_push($listado, $lista[$l]);
		$l++;
	}

	$g = 0;
	$generos = Array();
	$queryGenero = "select distinct genero from musica_lista order by genero asc";
	$qGenero = mysqli_query($con, $queryGenero);
	while($lin_gen = mysqli_fetch_array($qGenero))
	{
		$genero[$g] = new Filtros();
		$genero[$g]->filtro1 = $lin_gen[0];
		array_push($generos, $genero[$g]);
		$g++;
	}
	$a = 0;
	$artistas = Array();
	$queryArtista = "select distinct artista from musica_lista order by artista asc";
	$qArtista = mysqli_query($con, $queryArtista);
	while($lin_art = mysqli_fetch_array($qArtista))
	{
		$artista[$a] = new Filtros();
		$artista[$a]->filtro1 = $lin_art[0];
		array_push($artistas, $artista[$a]);
		$a++;
	}
	$p = 0;
	$paises = Array();
	$queryPais = "select distinct pais from musica_lista order by pais asc";
	$qPais = mysqli_query($con, $queryPais);
	while($lin_pai = mysqli_fetch_array($qPais))
	{
		$pais[$p] = new Filtros();
		$pais[$p]->filtro1 = $lin_pai[0];
		array_push($paises, $pais[$p]);
		$p++;
	}
	$y = 0;
	$anos = Array();
	$queryAno = "select distinct ano from musica_lista order by ano asc";
	$qAno = mysqli_query($con, $queryAno);
	while($lin_ano = mysqli_fetch_array($qAno))
	{
		$ano[$y] = new Filtros();
		$ano[$y]->filtro1 = $lin_ano[0];
		array_push($anos, $ano[$y]);
		$y++;
	}

	mysqli_close($con);
?>
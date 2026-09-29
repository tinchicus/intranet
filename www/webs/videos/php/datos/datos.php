<?php
	$con=base_connect("intranet");

	$queryFiltros = "select filtro1_musica, filtro1_videos, filtro2_videos, codigo from sesiones where token='$t'";
	$qFiltros = mysqli_query($con, $queryFiltros);
	$sesion = new Filtros();
	while($linea = mysqli_fetch_array($qFiltros))
	{
		$sesion->codigo = $linea[3];
		$sesion->filtro1 = $linea[1];
		$sesion->filtro2 = $linea[2];
		$sesion->tipo = $linea[0];
	}
	
	switch($sesion->filtro1)
	{
		case "series":
		case "lista":
		case "sagas":
		case "pelis":
			$tabla = "video_tube";
			$filtrado="where tipo='" . $sesion->filtro1 . "' and seccion!='series'"; 
			$queryListado = "select codigo, titulo, tipo, categoria, seccion, foto from $tabla $filtrado order by creado desc";
			break;
		case "seccion":
		case "categoria":
			$tabla = "video_tube";
			$filtrado="where $sesion->filtro1 = '" . $sesion->filtro2 . "' and seccion!='series'"; 
			$queryListado = "select codigo, titulo, tipo, categoria, seccion, foto from $tabla $filtrado order by creado desc";
			break;
		case "pais":
		case "estudio":
		case "ano":
			$tabla = "videos_lista";
			$filtrado="where $sesion->filtro1 = '" . $sesion->filtro2 . "' and seccion!='series'"; 
			$queryListado = "select codigo, titulo, 'pelis', categoria, seccion, foto from $tabla $filtrado order by creado desc";
			break;
		default:
			$tabla = "video_tube";
			$filtrado="where seccion != 'series'"; 
			$queryListado = "select codigo, titulo, tipo, categoria, seccion, foto from $tabla $filtrado order by creado desc";
			break;
	}
	
	$listas = Array();
	$l = 0;
	if (!$sesion->codigo)
	{
	$qListado = mysqli_query($con, $queryListado);
	while($lala = mysqli_fetch_array($qListado))
	{
		$peli[$l]=new Datos();
		$peli[$l]->codex=$lala[0];
		$peli[$l]->titulo=$lala[1];
		$tipo=$lala[2];
		$categ=$lala[3];
		$peli[$l]->seccion=$lala[4];
		$peli[$l]->foto=$lala[5];
		if ($tipo == "pelis")
		{
			$queryDatos="select estreno,director,pais,idioma,subtitulo,descripcion,estudio from videos_lista where codigo='" . $peli[$l]->codex . "'";
			$qDatos=mysqli_query($con, $queryDatos);
			while($lele=mysqli_fetch_array($qDatos))
			{
				$peli[$l]->estreno=$lele[0];
				$peli[$l]->director=$lele[1];
				$peli[$l]->pais=$lele[2];
				$peli[$l]->idioma=$lele[3];
				$peli[$l]->subtitulo=$lele[4];
				$peli[$l]->texto=$lele[5];
				$peli[$l]->estudio=$lele[6];
				$peli[$l]->track=0;
			}
		} else {
			$queryDatos="select texto from videos_series where codigo='" . $peli[$l]->codex . "'";
			$qDatos=mysqli_query($con, $queryDatos);
			while($lele=mysqli_fetch_array($qDatos))
			{
				$peli[$l]->texto=$lele[0];
			}
		}
		switch($tipo)
		{
			case "pelis":
				$peli[$l]->tipo="Video";
				break;
			case "series":
				$peli[$l]->tipo="Serie";
				break;
			case "sagas":
				$peli[$l]->tipo="Saga";
				break;
			case "lista":
				$peli[$l]->tipo="Lista";
				break;
		}
		switch($categ)
		{
			case "0":
				$peli[$l]->categoria="ATP";
				break;
			case "13":
				$peli[$l]->categoria="PM13";
				break;
			case "16":
				$peli[$l]->categoria="PM16";
				break;
			case "18":
				$peli[$l]->categoria="PM18";
				break;
			case "18p":
				$peli[$l]->categoria="PM18/R";
				break;
		}
		array_push($listas, $peli[$l]);
		$l++;
	}
	} else {
		$queryDatos="select titulo,seccion,categoria,texto,foto from videos_series where codigo='$sesion->codigo' limit 1";
		$qDatos=mysqli_query($con, $queryDatos);
		$datos = new Datos();
		while($lala = mysqli_fetch_array($qDatos))
		{
			$datos->titulo = $lala[0];
			$datos->seccion = $lala[1];
			$categ = $lala[2];
			$datos->texto = $lala[3];
			$datos->foto = $lala[4];
		}
		switch($categ)
		{
			case "0":
				$datos->categoria="ATP";
				break;
			case "13":
				$datos->categoria="PM13";
				break;
			case "16":
				$datos->categoria="PM16";
				break;
			case "18":
				$datos->categoria="PM18";
				break;
			case "18p":
				$datos->categoria="PM18/R";
				break;
		}
		$queryLista = "select archivo,track from videos_series where codigo='$sesion->codigo' order by track asc";
		$qLista = mysqli_query($con, $queryLista);
		while($lele = mysqli_fetch_array($qLista))
		{
			$peli[$l] = new Datos();
			$peli[$l]->archivo = $lele[0];
			$peli[$l]->track = $lele[1];
			$queryPeli = "select titulo, seccion, categoria, ano, descripcion, foto, estreno, estudio, idioma, subtitulo, pais, director from videos_lista where archivo='" . $peli[$l]->archivo . "'";
			$qPeli = mysqli_query($con, $queryPeli);
			while($lili = mysqli_fetch_array($qPeli))
			{
				$peli[$l]->titulo = $lili[0];
				$peli[$l]->seccion = $lili[1];
				$categ = $lili[2];
				$peli[$l]->ano = $lili[3];
				$peli[$l]->texto = $lili[4];
				$peli[$l]->foto = $lili[5];
				$peli[$l]->estreno = $lili[6];
				$peli[$l]->estudio = $lili[7];
				$peli[$l]->idioma = $lili[8];
				$peli[$l]->subtitulo = $lili[9];
				$peli[$l]->pais = $lili[10];
				$peli[$l]->director = $lili[11];
				switch($categ)
				{
					case "0":
						$peli[$l]->categoria="ATP";
						break;
					case "13":
						$peli[$l]->categoria="PM13";
						break;
					case "16":
						$peli[$l]->categoria="PM16";
						break;
					case "18":
						$peli[$l]->categoria="PM18";
						break;
					case "18p":
						$peli[$l]->categoria="PM18/R";
						break;
				}
			}
			if ($peli[$l]->titulo)
			{
				array_push($listas, $peli[$l]);
				$l++;
			}
		}
	}

	$querySeccion = "select distinct seccion from videos_lista order by seccion asc";
	$qSeccion = mysqli_query($con, $querySeccion);
	$seccion_flt = Array();
	$s = 0;
	while($lala = mysqli_fetch_array($qSeccion))
	{
		$section[$s] = new Datos();
		$section[$s]->seccion = $lala[0];
		array_push($seccion_flt, $section[$s]);
		$s++;
	}
	
	$queryCateg = "select distinct categoria from videos_lista order by categoria asc";
	$qCateg = mysqli_query($con, $queryCateg);
	$cat_flt = Array();
	$c = 0;
	while($lele = mysqli_fetch_array($qCateg))
	{
		$category[$c] = new Categoria();
		$category[$c]->valor = $lele[0];
		switch($category[$c]->valor)
		{
			case "0":
				$category[$c]->titulo = "Apta Todo Publico";
				break;
			case "13":
				$category[$c]->titulo = "Prohibido Menores 13 a&ntilde;os";
				break;
			case "16":
				$category[$c]->titulo = "Prohibido Menores 16 a&ntilde;os";
				break;
			case "18":
				$category[$c]->titulo = "Prohibido Menores 18 a&ntilde;os";
				break;
			case "18p":
				$category[$c]->titulo = "Prohibido Menores 18 a&ntilde;os/Reserva";
				break;
		}
		array_push($cat_flt, $category[$c]);
	}
	
	$queryPais = "select distinct pais from videos_lista order by pais asc";
	$qPais = mysqli_query($con, $queryPais);
	$pais_flt = Array();
	$p = 0;
	while($lili = mysqli_fetch_array($qPais))
	{
		$pais[$p] = new Datos();
		$pais[$p]->pais = $lili[0];
		array_push($pais_flt, $pais[$p]);
		$p++;
	}
	$queryEstudio = "select distinct estudio from videos_lista order by estudio asc";
	$qEstudio = mysqli_query($con, $queryEstudio);
	$est_flt = Array();
	$e = 0;
	while($lolo = mysqli_fetch_array($qEstudio))
	{
		$estudio[$e] = new Datos();
		$estudio[$e]->estudio = $lolo[0];
		array_push($est_flt, $estudio[$e]);
		$e++;
	}
	$queryAno = "select distinct ano from videos_lista order by ano asc";
	$qAno = mysqli_query($con, $queryAno);
	$ano_flt = Array();
	$a = 0;
	while($lulu = mysqli_fetch_array($qAno))
	{
		$ano[$a] = new Datos();
		$ano[$a]->ano = $lulu[0];
		array_push($ano_flt, $ano[$a]);
		$a++;
	}
?>
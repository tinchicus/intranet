<?php
	if (isset($_REQUEST["titulo"])) { $titulo=$_REQUEST["titulo"]; } else { $titulo=""; }
	if (isset($_REQUEST["director"])) { $director=$_REQUEST["director"]; } else { $director=""; }
	if (isset($_REQUEST["director2"])) { $director2=$_REQUEST["director2"]; } else { $director2=""; }
	if (isset($_REQUEST["seccion"])) { $seccion=$_REQUEST["seccion"]; } else { $seccion=""; }
	if (isset($_REQUEST["seccion2"])) { $seccion2=$_REQUEST["seccion2"]; } else { $seccion2=""; }
	if (isset($_REQUEST["categoria"])) { $categoria=$_REQUEST["categoria"]; } else { $categoria=""; }
	if (isset($_REQUEST["pais"])) { $pais=$_REQUEST["pais"]; } else { $pais=""; }
	if (isset($_REQUEST["pais2"])) { $pais2=$_REQUEST["pais2"]; } else { $pais2=""; }
	if (isset($_REQUEST["idioma"])) { $idioma=$_REQUEST["idioma"]; } else { $idioma=""; }
	if (isset($_REQUEST["idioma2"])) { $idioma2=$_REQUEST["idioma2"]; } else { $idioma2=""; }
	if (isset($_REQUEST["subs"])) { $subs=$_REQUEST["subs"]; } else { $subs=""; }
	if (isset($_REQUEST["valor"])) { $valor=$_REQUEST["valor"]; } else { $valor=""; }
	if (isset($_REQUEST["dia"])) { $dia=$_REQUEST["dia"]; } else { $dia=""; }
	if (isset($_REQUEST["mes"])) { $mes=$_REQUEST["mes"]; } else { $mes=""; }
	if (isset($_REQUEST["ano"])) { $ano=$_REQUEST["ano"]; } else { $ano=""; }
	if (isset($_REQUEST["estudio"])) { $estudio=$_REQUEST["estudio"]; } else { $estudio=""; }
	if (isset($_REQUEST["estudio2"])) { $estudio2=$_REQUEST["estudio2"]; } else { $estudio2=""; }
	if (isset($_REQUEST["texto"])) { $texto=$_REQUEST["texto"]; } else { $texto=""; }
	if (isset($_REQUEST["foto_p"])) { $foto_p=$_REQUEST["foto_p"]; } else { $foto_p=""; }
	if (isset($_REQUEST["lista-serie"])) { $lista_serie=$_REQUEST["lista-serie"]; } else { $lista_serie=""; }
	if (isset($_REQUEST["videos_l"])) { $videos_l=$_REQUEST["videos_l"]; } else { $videos_l=""; }

	$v=0;
	$listado = Array();
	
	switch($id)
	{
		case "1":
			$queryVideos = "select codigo, titulo, seccion, categoria, foto, 'serie' from video_tube where tipo='series' order by codigo desc";
			break;
		case "2":
			$queryVideos = "select codigo, titulo, seccion, categoria, foto, 'saga' from video_tube where tipo='sagas' order by codigo desc";
			break;
		case "3":
			$queryVideos = "select codigo, titulo, seccion, categoria, foto, 'lista' from video_tube where tipo='lista' order by codigo desc";
			break;
		default:
			$queryVideos = "select codigo, titulo, seccion, categoria, foto, 'peli' from videos_lista order by codigo desc";
	}
	$qVideos = mysqli_query($con, $queryVideos);
	while($lala = mysqli_fetch_array($qVideos))
	{
		$video[$v] = new Datos();
		$video[$v]->codigo = $lala[0];
		$video[$v]->titulo = $lala[1];
		$video[$v]->seccion = $lala[2];
		$categ = $lala[3];
		$video[$v]->foto = $lala[4];
		$video[$v]->tipo = $lala[5];
		switch($categ)
		{
			case "0":
				$video[$v]->categoria="ATP";
				break;
			case "13":
				$video[$v]->categoria="PM13";
				break;
			case "16":
				$video[$v]->categoria="PM16";
				break;
			case "18":
				$video[$v]->categoria="PM18";
				break;
			case "18p":
				$video[$v]->categoria="PM18/R";
				break;
		}
		array_push($listado, $video[$v]);
		$v++;
	}
	
	$d = 0;
	$directores = Array();
	$queryDirec = "select distinct director from videos_lista order by director asc";
	$qDirec = mysqli_query($con, $queryDirec);
	while($lele = mysqli_fetch_array($qDirec))
	{
		$director_l[$d] = new Datos();
		$director_l[$d]->director = $lele[0];
		array_push($directores, $director_l[$d]);
		$d++;
	}

	$s = 0;
	$secciones = Array();
	$querySec = "select distinct seccion from videos_lista order by seccion asc";
	$qSec = mysqli_query($con, $querySec);
	while($lele = mysqli_fetch_array($qSec))
	{
		$seccion_l[$s] = new Datos();
		$seccion_l[$s]->seccion = $lele[0];
		array_push($secciones, $seccion_l[$s]);
		$s++;
	}

	$p = 0;
	$paises = Array();
	$queryPais = "select distinct pais from videos_lista order by pais asc";
	$qPais = mysqli_query($con, $queryPais);
	while($lele = mysqli_fetch_array($qPais))
	{
		$pais_l[$p] = new Datos();
		$pais_l[$p]->pais = $lele[0];
		array_push($paises, $pais_l[$p]);
		$p++;
	}

	$i = 0;
	$idiomas = Array();
	$queryIdioma = "select distinct idioma from videos_lista order by idioma asc";
	$qIdioma = mysqli_query($con, $queryIdioma);
	while($lele = mysqli_fetch_array($qIdioma))
	{
		$idioma_l[$i] = new Datos();
		$idioma_l[$i]->idioma = $lele[0];
		array_push($idiomas, $idioma_l[$i]);
		$i++;
	}

	$e = 0;
	$estudios = Array();
	$queryIdioma = "select distinct estudio from videos_lista order by estudio asc";
	$qIdioma = mysqli_query($con, $queryIdioma);
	while($lele = mysqli_fetch_array($qIdioma))
	{
		$estudio_l[$e] = new Datos();
		$estudio_l[$e]->estudio = $lele[0];
		array_push($estudios, $estudio_l[$e]);
		$e++;
	}
	
	$p = 0;
	$pelis = Array();
	$queryPeli = "select archivo, titulo from videos_lista order by codigo desc";
	$qPeli = mysqli_query($con, $queryPeli);
	while($lele = mysqli_fetch_array($qPeli))
	{
		$peli[$p] = new Datos();
		$peli[$p]->archivo = $lele[0];
		$peli[$p]->titulo = $lele[1];
		array_push($pelis, $peli[$p]);
		$p++;
	}
	
	$sesion = new Datos();
	$queryCodex = "select codigo from sesiones where token='$t'";
	$qCodex = mysqli_query($con, $queryCodex);
	while($lili = mysqli_fetch_array($qCodex))
	{
		$sesion->codigo = $lili[0];
	}

	$tipo = new Datos();
	$queryTipo = "select tipo from video_tube where codigo = '$sesion->codigo'";
	$qTipo = mysqli_query($con, $queryTipo);
	while($lolo = mysqli_fetch_array($qTipo)) { $tipo->tipo = $lolo[0]; }

	if (!$titulo && !$seccion && !$categoria)
	{		
		$l = 0;
		$lista = Array();
		switch($tipo->tipo)
		{
			case "series":
			case "sagas":
			case "lista":
				$queryDatos = "select titulo, seccion, categoria, texto, foto, archivo from videos_series where codigo='$sesion->codigo' order by track asc";
				$qDatos = mysqli_query($con, $queryDatos);
				while($lulu = mysqli_fetch_array($qDatos))
				{
					$datos_m[$l] = new Datos();
					$titulo = $lulu[0];
					$seccion = $lulu[1];
					$categoria = $lulu[2];
					$texto = $lulu[3];
					$foto_p = $lulu[4];
					$datos_m[$l]->archivo = $lulu[5];
					$queryVideo = "select titulo, foto from videos_lista where archivo='" . $datos_m[$l]->archivo . "'";
					$qVideo = mysqli_query($con, $queryVideo);
					while($lxlx = mysqli_fetch_array($qVideo))
					{
						$datos_m[$l]->titulo = $lxlx[0];
						$datos_m[$l]->foto = $lxlx[1];
					}
					array_push($lista, $datos_m[$l]);
					$l++;
				}
				$videos_l = Array();
				for($i = 0; $i < count($lista); $i++)
				{
					$videos_l[$i] = $lista[$i]->archivo . ";" . $lista[$i]->titulo . ";no"; 
				}
				break;
			default:
				$queryDatos = "select titulo, seccion, categoria, ano, director, pais, idioma, subtitulo, valor, estreno, estudio, descripcion, foto from videos_lista where codigo='" . $sesion->codigo . "'";
				$qDatos = mysqli_query($con, $queryDatos);
				$datos_m = new Datos();
				while($lyly = mysqli_fetch_array($qDatos))
				{
					$titulo = $lyly[0];
					$seccion = $lyly[1];
					$categoria = $lyly[2];
					$ano_v = $lyly[3];
					$director = $lyly[4];
					$pais = $lyly[5];
					$idioma = $lyly[6];
					$subs = $lyly[7];
					$valor = $lyly[8];
					$estreno = $lyly[9];
					$estudio = $lyly[10];
					$texto = $lyly[11];
					$foto_p = $lyly[12];
					$fecha = explode("/", $estreno);
					$dia = $fecha[0];
					$mes = $fecha[1];
					$ano = $fecha[2];
				}
		}
	}

?>
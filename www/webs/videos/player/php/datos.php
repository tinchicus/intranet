<?php
	$con=base_connect("intranet");
	
	$sesion = new Filtros();
	$queryCodigo="select codigo,track,filtro1_musica, filtro1_videos, filtro2_videos from sesiones where token='$t'";
	$qCodigo=mysqli_query($con, $queryCodigo);
	while($linea = mysqli_fetch_array($qCodigo))
	{
		$sesion->codigo=$linea[0];
		$sesion->track=$linea[1];
		$sesion->tipo=$linea[2];
		$sesion->filtro1=$linea[3];
		$sesion->filtro2=$linea[4];
	}
	
	switch($sesion->tipo)
	{
		case "Video":		
			$peli=new Datos();
			$queryListado="select codigo,titulo,seccion,categoria,foto,estreno,director,pais,idioma,descripcion,subtitulo,estudio,ano,archivo from videos_lista where seccion!='Series' and codigo='$sesion->codigo'";
			$qListado=mysqli_query($con, $queryListado);
			while($lala=mysqli_fetch_array($qListado))
			{
				$peli->codex=$lala[0];
				$peli->titulo=$lala[1];
				$peli->seccion=$lala[2];
				$categ=$lala[3];
				$peli->foto=$lala[4];
				$peli->estreno=$lala[5];
				$peli->director=$lala[6];
				$peli->pais=$lala[7];
				$peli->idioma=$lala[8];
				$peli->texto=$lala[9];
				$peli->subtitulo=$lala[10];
				$peli->estudio=$lala[11];
				$peli->ano=$lala[12];
				$peli->archivo=$lala[13];
				switch($categ)
				{
					case "0":
						$peli->categoria="ATP";
						break;
					case "13":
						$peli->categoria="PM13";
						break;
					case "16":
						$peli->categoria="PM16";
						break;
					case "18":
						$peli->categoria="PM18";
						break;
					case "18p":
						$peli->categoria="PM18/R";
						break;
				}
			}

			switch($sesion->filtro1)
			{
				case "pelis":
					$filtrado="where tipo='" . $sesion->filtro1 . "' and seccion!='series'"; 
					break;
				case "seccion":
				case "categoria":
				case "pais":
				case "estudio":
				case "ano":
					$filtrado="where $sesion->filtro1 = '" . $sesion->filtro2 . "' and seccion!='series'"; 
					break;
				default:
					$filtrado="where seccion != 'series'"; 
					break;
			}			
			
			$queryProximo="select codigo from videos_lista $filtrado order by codigo desc";
			$qProximo = mysqli_query($con, $queryProximo);
			$p = 0;
			while($lele = mysqli_fetch_array($qProximo))
			{
				$cod_act[$p]=$lele[0];
				if ($cod_act[$p] == $sesion->codigo) $actual = $p;
				$p++;
			}
			$prx = $actual + 1;
			if ($prx >= $p) $prx = 0;
			$proximo = new Proximo();
			$proximo->track = 0;
			$proximo->codigo = $cod_act[$prx];
			$proximo->tipo = $sesion->tipo;

			break;
		default:
			$queryTotal="select count(*) from videos_series where codigo='$sesion->codigo'";
			$qTotal = mysqli_query($con, $queryTotal);
			while($lele = mysqli_fetch_array($qTotal)){ $total=$lele[0]; }
			
			$datos = new Datos();
			$queryVideo="select archivo, titulo from videos_series where codigo='$sesion->codigo' and track=$sesion->track";
			$qVideo=mysqli_query($con, $queryVideo);
			while($lili=mysqli_fetch_array($qVideo)) { 
				$datos->archivo=$lili[0]; 
				$datos->titulo=$lili[1]; 
			}
			
			$prx = $sesion->track + 1;
			if ($prx > $total) $prx = 1;

			$queryChequeo = "select titulo from videos_lista where archivo='" . $datos->archivo . "'";
			$qChequeo = mysqli_query($con, $queryChequeo);
			while($lxlx = mysqli_fetch_array($qChequeo)) { $titulo_chk = $lxlx[0]; }
			
			if (!$titulo_chk) 
			{
				$sesion->track = $prx;
				$prx = $sesion->track + 1;
				if ($prx > $total) $prx = 1;
				$datos = new Datos();
				$queryVideo="select archivo from videos_series where codigo='$sesion->codigo' and track=$sesion->track";
				$qVideo=mysqli_query($con, $queryVideo);
				while($lili=mysqli_fetch_array($qVideo)) { $datos->archivo=$lili[0]; }
			}

			$proximo = new Proximo();
			$proximo->codigo = $sesion->codigo;
			$proximo->tipo = $sesion->tipo;
			$proximo->track = $prx;
				
			$peli=new Datos();
			$queryListado="select codigo,titulo,seccion,categoria,foto,estreno,director,pais,idioma,descripcion,subtitulo,estudio,ano,archivo from videos_lista where archivo='$datos->archivo'";
			$qListado=mysqli_query($con, $queryListado);
			while($lala=mysqli_fetch_array($qListado))
			{
				$peli->codex=$lala[0];
				$peli->titulo=$lala[1];
				$peli->seccion=$lala[2];
				$categ=$lala[3];
				$peli->foto=$lala[4];
				$peli->estreno=$lala[5];
				$peli->director=$lala[6];
				$peli->pais=$lala[7];
				$peli->idioma=$lala[8];
				$peli->texto=$lala[9];
				$peli->subtitulo=$lala[10];
				$peli->estudio=$lala[11];
				$peli->ano=$lala[12];
				$peli->archivo=$lala[13];
				switch($categ)
				{
					case "0":
						$peli->categoria="ATP";
						break;
					case "13":
						$peli->categoria="PM13";
						break;
					case "16":
						$peli->categoria="PM16";
						break;
					case "18":
						$peli->categoria="PM18";
						break;
					case "18p":
						$peli->categoria="PM18/R";
						break;
				}
			}
			break;
	}
?>
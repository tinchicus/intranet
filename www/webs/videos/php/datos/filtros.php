<?php
	$con=base_connect("intranet");

	$querySeccion = "select distinct seccion from videos_lista order by seccion asc";
	$qSeccion = mysqli_query($con, $querySeccion);
	$seccion_flt = Array();
	$s = 0;
	while($lala = mysqli_fetch_array($qSeccion))
	{
		array_push($seccion_flt, $lala[0]);
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
			case "13p":
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

	mysqli_close($con);
?>
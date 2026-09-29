<?php
	$queryNews="select tipo, texto from news where codigo='" . $dato_s->codigo . "'";
	$qNews = mysqli_query($con, $queryNews);
	$novedad = new Datos();
	while($lala = mysqli_fetch_array($qNews))
	{
		$novedad->tipo = $lala[0];
		$novedad->texto = $lala[1];
		$novedad->codigo = $dato_s->codigo;
	}

?>
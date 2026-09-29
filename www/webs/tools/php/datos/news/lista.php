<?php
	$l = 0;
	$lista = Array();
	$queryLista = "SELECT codigo, fecha, tipo, texto, usuario from news order by codigo desc";
	$qLista = mysqli_query($con, $queryLista);
	while($lala = mysqli_fetch_array($qLista))
	{
		$datos_l[$l] = new Datos();
		$datos_l[$l]->codigo = $lala[0];
		$datos_l[$l]->fecha = $lala[1];
		$datos_l[$l]->tipo = $lala[2];
		$datos_l[$l]->texto = $lala[3];
		$datos_l[$l]->usuario = $lala[4];
		array_push($lista, $datos_l[$l]);
		$l++;
	}
	
	$dato_s = new Datos();
	$queryCodigo = "select codigo from sesiones where token='$t'";
	$qCodigo = mysqli_query($con, $queryCodigo);
	while($lele = mysqli_fetch_array($qCodigo)) { $dato_s->codigo = $lele[0]; }
?>
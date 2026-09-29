<?php
	$l = 0;
	$lista = Array();
	$queryLista = "SELECT frases.id, frases.id_autor, frases.texto, frases_autor.nombre, frases_autor.apellido FROM intranet.frases, intranet.frases_autor where frases_autor.codigo = frases.id_autor order by frases.creado desc";
	$qLista = mysqli_query($con, $queryLista);
	while($lala = mysqli_fetch_array($qLista))
	{
		$datos_l[$l] = new Datos();
		$datos_l[$l]->id = $lala[0];
		$datos_l[$l]->id_autor = $lala[1];
		$datos_l[$l]->texto = $lala[2];
		$datos_l[$l]->nombre = $lala[3];
		$datos_l[$l]->apellido = $lala[4];
		array_push($lista, $datos_l[$l]);
		$l++;
	}	
?>
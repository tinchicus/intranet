<?php
	if (isset($_REQUEST["texto"])) { $texto=$_REQUEST["texto"]; } else { $texto=""; }
	if (isset($_REQUEST["autor"])) { $autor=$_REQUEST["autor"]; } else { $autor=""; }
	if (isset($_REQUEST["nombre"])) { $nombre=$_REQUEST["nombre"]; } else { $nombre=""; }
	if (isset($_REQUEST["apellido"])) { $apellido=$_REQUEST["apellido"]; } else { $apellido=""; }
	if (isset($_REQUEST["pais"])) { $pais=$_REQUEST["pais"]; } else { $pais=""; }
	if (isset($_REQUEST["pais2"])) { $pais2=$_REQUEST["pais2"]; } else { $pais2=""; }

	$l = 0;
	$autores = Array();
	$queryLista = "select distinct codigo, nombre, apellido from frases_autor order by codigo asc";
	$qLista = mysqli_query($con, $queryLista);
	while($lala = mysqli_fetch_array($qLista))
	{
		$autor_l[$l] = new Datos();
		$autor_l[$l]->id_autor = $lala[0];
		$autor_l[$l]->nombre_autor = $lala[1];
		$autor_l[$l]->apellido_autor = $lala[2];
		array_push($autores, $autor_l[$l]);
		$l++;
	}
	
	$l = 0;
	$paises = Array();
	$queryLista = "select distinct pais from frases_autor order by pais asc";
	$qLista = mysqli_query($con, $queryLista);
	while($lele = mysqli_fetch_array($qLista))
	{
		$pais_l[$l] = new Datos();
		$pais_l[$l]->pais_autor = $lele[0];
		array_push($paises, $pais_l[$l]);
		$l++;
	}
	
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
	
	$querySesion = "select codigo from sesiones where token='$t'";
	$qSesion = mysqli_query($con, $querySesion);
	$sesion = new Datos();
	while($lili = mysqli_fetch_array($qSesion)) { $sesion->id = $lili[0]; }
	
	if (!$autor && !$texto && $sesion->id)
	{
		$queryDatos = "select id_autor, texto from frases where id='" . $sesion->id . "'";
		$qDatos = mysqli_query($con, $queryDatos);
		while($lolo = mysqli_fetch_array($qDatos))
		{
			$autor = $lolo[0];
			$texto = $lolo[1];
		}
	}	
?>
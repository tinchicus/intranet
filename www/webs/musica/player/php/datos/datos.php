<?php
	$con = base_connect("intranet");
	
	$sesion = new Objeto();
	$querySesion="select codigo,track,filtro1_videos,filtro1_musica,filtro2_musica from sesiones where token='$t'";
	$qSesion=mysqli_query($con, $querySesion);
	while($lala=mysqli_fetch_array($qSesion))
	{
		$sesion->codigo=$lala[0];
		$sesion->track=$lala[1];
		$sesion->tipo=$lala[2];
		$sesion->filtro1=$lala[3];
		$sesion->filtro2=$lala[4];
	}

	switch($sesion->filtro1)
	{
		case "canciones":
			$filtrado="where tipo='ar'";
			break;
		case "discos":
			$filtrado="where tipo='al'";
			break;
		case "genero":
		case "artista":
		case "pais":
		case "ano":
			$filtrado="where $sesion->filtro1='$sesion->filtro2'";
			break;
		default:
			$filtrado="";
			break;
	}
	
	$lista = Array();
	$l = 0;
	$queryListado="select codigo,artista,titulo,foto,tipo from musica_lista $filtrado order by creado desc";
	$qListado=mysqli_query($con, $queryListado);
	while($lulu=mysqli_fetch_array($qListado))
	{
		$listado_l[$l] = new Datos();
		$listado_l[$l]->codigo = $lulu[0];
		$listado_l[$l]->artista = $lulu[1];
		$listado_l[$l]->titulo = $lulu[2];
		$listado_l[$l]->foto = $lulu[3];
		$listado_l[$l]->tipo = $lulu[4];
		$listado_l[$l]->track = 1;
		array_push($lista, $listado_l[$l]);
		$l++;
	}
	$actual = 0;
	for($i=0; $i < count($lista); $i++)
	{
		if ($lista[$i]->codigo == $sesion->codigo) $actual=$i;
	}
	$ant = $actual - 1;
	$prx = $actual + 1;
	if ($prx >= count($lista)) $prx=0;
	if ($ant < 0) $ant=count($lista)-1;
	
	$proximo = new Objeto();
	$anterior = new Objeto();
	$proximo->codigo=$lista[$prx]->codigo;
	$proximo->tipo=$lista[$prx]->tipo;
	$anterior->codigo=$lista[$ant]->codigo;
	$anterior->tipo=$lista[$ant]->tipo;
	
	$datos_web = new Datos();
	$datos_web->artista = $lista[$actual]->artista;
	$datos_web->titulo = $lista[$actual]->titulo;

	$p = 0;
	$playlists = Array();
	$queryPlaylist = "select distinct codigo, titulo from musica_playlists where tipo='publico' order by codigo asc";
	$qPlaylist = mysqli_query($con, $queryPlaylist);
	while($linea = mysqli_fetch_array($qPlaylist))
	{
		$pl[$p] = new Datos();
		$pl[$p]->codigo = $linea[0];
		$pl[$p]->titulo = $linea[1];
		array_push($playlists, $pl[$p]);
		$p++;
	}
	
	
	switch($sesion->tipo)
	{
		case "ar":
			$cancion = new Datos();
			$queryCancion="select artista,titulo,pais,genero,ano,disco,foto,archivo from musica_canciones where id='$sesion->codigo'";
			$qCancion=mysqli_query($con, $queryCancion);
			while($lele=mysqli_fetch_array($qCancion))
			{
				$cancion->artista = $lele[0];
				$cancion->titulo = $lele[1];
				$cancion->pais = $lele[2];
				$cancion->genero = $lele[3];
				$cancion->ano = $lele[4];
				$cancion->disco = $lele[5];
				$cancion->foto = $lele[6];
				$cancion->archivo = $lele[7];
				$cancion->track = $sesion->track;
			}
			$disco = new Datos();
			$queryDisco="select titulo from musica_discos where id='" . $cancion->disco . "'";
			$qDisco = mysqli_query($con, $queryDisco);
			while($lili = mysqli_fetch_array($qDisco)) { $cancion->disco = $lili[0]; }		
			break;
		case "al":
			$disco = new Datos();
			$queryDisco = "select artista,titulo,pais,genero,foto,ano from musica_discos where id='$sesion->codigo'";
			$qDisco = mysqli_query($con, $queryDisco);
			while($lala = mysqli_fetch_array($qDisco))
			{
				$disco->artista = $lala[0];
				$disco->titulo = $lala[1];
				$disco->pais = $lala[2];
				$disco->genero = $lala[3];
				$disco->foto = $lala[4];
				$disco->ano = $lala[5];
			}
			$a = 0;
			$lista_disco = Array();
			$queryLista = "select artista,titulo,pais,genero,ano,foto,archivo,track from musica_canciones where disco='$sesion->codigo' order by track asc";
			$qLista = mysqli_query($con, $queryLista);
			while($lele = mysqli_fetch_array($qLista))
			{
				$canciones[$a] = new Datos();
				$canciones[$a]->artista = $lele[0];
				$canciones[$a]->titulo = $lele[1];
				$canciones[$a]->pais = $lele[2];
				$canciones[$a]->genero = $lele[3];
				$canciones[$a]->ano = $lele[4];
				$canciones[$a]->foto = $lele[5];
				$canciones[$a]->archivo = $lele[6];
				$canciones[$a]->track = $lele[7];
				array_push($lista_disco, $canciones[$a]);
				$a++;
			}
			$cancion=new Datos();
			$cancion->artista = $canciones[0]->artista;
			$cancion->titulo = $canciones[0]->titulo;
			$cancion->pais = $canciones[0]->pais;
			$cancion->genero = $canciones[0]->genero;
			$cancion->ano = $canciones[0]->ano;
			$cancion->foto = $canciones[0]->foto;
			$cancion->archivo = $canciones[0]->archivo;
			$cancion->track = $canciones[0]->track;
			
			break;
		case "pl":
			$lista = Array();
			$l = 0;
			$queryLista="select archivo,track from musica_playlists where codigo='" . $sesion->codigo . "' order by track asc";
			$qLista = mysqli_query($con, $queryLista);
			while($lala=mysqli_fetch_array($qLista))
			{
				$listado[$l] = new Datos();
				$listado[$l]->codigo = $sesion->codigo;
				$listado[$l]->tipo = $sesion->tipo;
				$listado[$l]->archivo = $lala[0];
				$listado[$l]->track = $lala[1];
				$queryDatos = "select artista,titulo,pais,ano,genero,disco,foto from musica_canciones where archivo='" . $listado[$l]->archivo . "'";
				$qDatos = mysqli_query($con, $queryDatos);
				while($lele=mysqli_fetch_array($qDatos))
				{
					$listado[$l]->artista = $lele[0];
					$listado[$l]->titulo = $lele[1];
					$listado[$l]->pais = $lele[2];
					$listado[$l]->ano = $lele[3];
					$listado[$l]->genero = $lele[4];
					$listado[$l]->disco = $lele[5];
					$listado[$l]->foto = $lele[6];
					$queryDisco = "select titulo from musica_discos where id='" . $listado[$l]->disco . "'";
					$qDisco=mysqli_query($con, $queryDisco);
					while($lili=mysqli_fetch_array($qDisco)) { $listado[$l]->disco = $lili[0]; }
				}
				if ($listado[$l]->artista)
				{
					array_push($lista, $listado[$l]);
					$l++;
				}
			}
			
			for($i=0; $i < count($lista); $i++)
			{
				if ($lista[$i]->track == $sesion->track) { $actual = $i; }
			}
			
			$cancion = new Datos();
			$cancion->artista = $lista[$actual]->artista;
			$cancion->titulo = $lista[$actual]->titulo;
			$cancion->pais = $lista[$actual]->pais;
			$cancion->ano = $lista[$actual]->ano;
			$cancion->genero = $lista[$actual]->genero;
			$cancion->disco = $lista[$actual]->disco;
			$cancion->foto = $lista[$actual]->foto;
			$cancion->archivo = $lista[$actual]->archivo;
			$cancion->track = $lista[$actual]->track;
			
			break;
	}

	mysqli_close($con);
?>
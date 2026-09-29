<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["archivo"])) { $archivo=$_REQUEST["archivo"]; } else { $archivo=""; }
	if (isset($_REQUEST["lista"])) { $lista=$_REQUEST["lista"]; } else { $lista=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	$queryTrack = "select track,titulo,foto,tipo,genero from musica_playlists where codigo='$lista' order by track desc limit 1";
	$qTrack=mysqli_query($con, $queryTrack);
	
	while($lala = mysqli_fetch_array($qTrack))
	{
		$track=$lala[0];
		$titulo=$lala[1];
		$foto=$lala[2];
		$tipo=$lala[3];
		$genero=$lala[4];
	}
	$track++;
	
	$queryAgregar = "insert into musica_playlists values (NULL,'$lista','$titulo','$foto','$archivo',$track,'$tipo','$genero',NOW(),NOW(),'anonimo')";
	$qAgregar = mysqli_query($con, $queryAgregar);

?>
	
	
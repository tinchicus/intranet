<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["id"])) { $id=$_REQUEST["id"]; } else { $id=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	$queryFoto = "select foto from musica_playlists where codigo = '$codigo'";
	$qFoto = mysqli_query($con, $queryFoto);
	while($lele = mysqli_fetch_array($qFoto)) { $foto = $lele[0]; }
	
	$chk = substr($foto,0,2);
	if ($chk == "PL")
	{
		$removePic = "rm /musica/pics/" . $foto;
		system($removePic);	
	}
	
	$queryBorrar="delete from musica_playlists where codigo = '$codigo'";
	$qBorrar = mysqli_query($con, $queryBorrar);
	
	header('location: ../../../musica.php?t=' . $t . '&app=1&id=2');
?>
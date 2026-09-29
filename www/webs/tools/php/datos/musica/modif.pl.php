<?php
	if (isset($_REQUEST["token"])) { $token=$_REQUEST["token"]; } else { $token=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	if (isset($_REQUEST["titulo"])) { $titulo=$_REQUEST["titulo"]; } else { $titulo=""; }
	if (isset($_REQUEST["track_lst"])) { $track_lst=$_REQUEST["track_lst"]; } else { $track_lst=""; }
	if (isset($_REQUEST["genero"])) { $genero=$_REQUEST["genero"]; } else { $genero=""; }
	if (isset($_REQUEST["tipo"])) { $tipo=$_REQUEST["tipo"]; } else { $tipo=""; }
	if (isset($_FILES["foto"]["tmp_name"])) { $foto=$_FILES["foto"]["tmp_name"]; } else { $foto=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");

	$queryUser = "select usuario from usuarios where token_tools = '$token'";
	$qUser = mysqli_query($con, $queryUser);
	while($lala = mysqli_fetch_array($qUser)) { $user = $lala[0]; }
	
	if ($foto)
	{
		move_uploaded_file($foto,"/musica/pics/" . $codigo);
		$queryFoto = "update musica_playlists  set foto='$codigo' where codigo='$codigo'";
		$qFoto = mysqli_query($con, $queryFoto);
		$foto = $codigo;
	} else {
		$queryFoto = "select distinct foto from musica_playlists where codigo='$codigo'";
		$qFoto = mysqli_query($con, $queryFoto);
		while($lele = mysqli_fetch_array($qFoto)) { $foto = $lele[0]; }
	}
	
	$queryBorrar = "delete from musica_playlists where codigo='$codigo'";
	$qBorrar = mysqli_query($con, $queryBorrar);
	
	$track=1;
	foreach($track_lst as $tl)
	{
		$dato = explode(";", $tl);
		if ($dato[1] == "no")
		{
			$queryEnlistar = "insert into musica_playlists values (NULL,'$codigo','$titulo','$foto','$dato[0]',$track,'$tipo','$genero',NOW(),NOW(),'$user')";
			$qListar = mysqli_query($con, $queryEnlistar);
			$track++;
		}
	}
	
	$queryLimpiar = "update sesiones set codigo=NULL,filtro1_musica=NULL where token='$token'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);
	
	header('location: ../../../musica.php?t=' . $token . '&app=1&id=0');

?>
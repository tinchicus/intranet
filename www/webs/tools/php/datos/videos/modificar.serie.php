<?php
	if (isset($_REQUEST["token"])) { $token=$_REQUEST["token"]; } else { $token=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	if (isset($_REQUEST["titulo"])) { $titulo=$_REQUEST["titulo"]; } else { $titulo=""; }
	if (isset($_REQUEST["seccion"])) { $seccion=$_REQUEST["seccion"]; } else { $seccion=""; }
	if (isset($_REQUEST["categoria"])) { $categoria=$_REQUEST["categoria"]; } else { $categoria=""; }
	if (isset($_REQUEST["texto"])) { $texto=$_REQUEST["texto"]; } else { $texto=""; }
	if (isset($_FILES["foto"]["tmp_name"])) { $foto=$_FILES["foto"]["tmp_name"]; } else { $foto=""; }
	if (isset($_REQUEST["videos_l"])) { $videos_l=$_REQUEST["videos_l"]; } else { $videos_l=""; }

	include("intranet.inc");
	$con=base_connect("intranet");

	$querySesion = "select usuario from sesiones where token='$token'";
	$qSesion = mysqli_query($con, $querySesion);
	while ($lele = mysqli_fetch_array($qSesion)) { $u = $lele[0]; }
	$queryUser = "select usuario from usuarios where uuid='$u'";
	$qUser = mysqli_query($con, $queryUser);
	while($lili = mysqli_fetch_array($qUser)) { $user = $lili[0]; }
	$queryFoto = "select foto from videos_series where codigo='$codigo'";
	$qFoto = mysqli_query($con, $queryFoto);
	while($lolo = mysqli_fetch_array($qFoto)) { $foto_id = $lolo[0]; }

	if ($foto) 
	{
		move_uploaded_file($foto, "/videos/pics/" . $codigo);
		$foto_id = $codigo;
	}
	
	$track = 1;
	$queryEliminar = "delete from videos_series where codigo = '$codigo'";
	$qEliminar = mysqli_query($con, $queryEliminar);
	foreach($videos_l as $v)
	{
		$elem = explode(";", $v);
		if ($elem[2]=="no")
		{
			$queryIngresar="insert into videos_series values (NULL,'$codigo','" . htmlspecialchars($titulo, ENT_QUOTES) . "','$seccion','$categoria','" . htmlspecialchars($texto, ENT_QUOTES) . "','$foto_id','$elem[0]',$track,NOW(),NOW(),'$user')";
			$qIngresar = mysqli_query($con, $queryIngresar);
			$track++;
		}
	}
	
	$queryAct = "update video_tube set titulo='$titulo', seccion='$seccion', categoria='$categoria', foto='$foto_id' where codigo='$codigo'";
	$qAct = mysqli_query($con, $queryAct);

	$queryLimpiar = "update sesiones set codigo=NULL where token='$token'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);

	header('location: ../../../videos.php?t=' . $token . '&app=1');
?>
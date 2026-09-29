<?php
	if (isset($_REQUEST["token"])) { $token=$_REQUEST["token"]; } else { $token=""; }
	if (isset($_REQUEST["titulo"])) { $titulo=$_REQUEST["titulo"]; } else { $titulo=""; }
	if (isset($_REQUEST["seccion"])) { $seccion=$_REQUEST["seccion"]; } else { $seccion=""; }
	if (isset($_REQUEST["categoria"])) { $categoria=$_REQUEST["categoria"]; } else { $categoria=""; }
	if (isset($_REQUEST["texto"])) { $texto=$_REQUEST["texto"]; } else { $texto=""; }
	if (isset($_REQUEST["tipo"])) { $tipo=$_REQUEST["tipo"]; } else { $tipo=""; }
	if (isset($_REQUEST["lista-serie"])) { $lista=$_REQUEST["lista-serie"]; } else { $lista=""; }
	if (isset($_FILES["foto"]["tmp_name"])) { $foto=$_FILES["foto"]["tmp_name"]; } else { $foto=""; }
	$lista = substr($lista, 0, strlen($lista)-1);

	include("intranet.inc");
	$con=base_connect("intranet");
	
	$videos = explode(";", $lista);

	$querySesion = "select usuario from sesiones where token='$token'";
	$qSesion = mysqli_query($con, $querySesion);
	while ($lele = mysqli_fetch_array($qSesion)) { $u = $lele[0]; }
	$queryUser = "select usuario from usuarios where uuid='$u'";
	$qUser = mysqli_query($con, $queryUser);
	while($lili = mysqli_fetch_array($qUser)) { $user = $lili[0]; }
	$queryCodigo = "select distinct codigo from videos_series order by codigo desc limit 1";
	$qCodigo = mysqli_query($con, $queryCodigo);
	while($lala = mysqli_fetch_array($qCodigo)) { $codex = $lala[0]; }
	if (!$codex) { $codex = "LST1000000000"; } else { $codex++; }
	if ($foto)
	{
		move_uploaded_file($foto,"/videos/pics/" . $codex);
		$foto_id = $codex;
	} else {
		$foto_id = "";
	}
	
	$track=1;
	foreach($videos as $v)
	{
		$queryLista = "insert into videos_series values (NULL,'$codex','" . htmlspecialchars($titulo, ENT_QUOTES) ."','$seccion','$categoria','" . htmlspecialchars($texto, ENT_QUOTES) ."','$foto_id','$v',$track,NOW(),NOW(),'$user')";
		$qLista = mysqli_query($con, $queryLista);
		$track++;
	}
	
	$queryTube = "insert into video_tube values (NULL,'$codex','" . htmlspecialchars($titulo, ENT_QUOTES) ."','$tipo','$categoria','$seccion','$foto_id',NOW())";
	$qTube = mysqli_query($con, $queryTube);
	
	$queryLimpiar = "update sesiones set codigo=NULL where token='$token'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);
	
	header('location: ../../../videos.php?t=' . $token . '&app=1');
?>
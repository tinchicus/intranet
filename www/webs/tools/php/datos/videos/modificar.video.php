<?php
	if (isset($_REQUEST["token"])) { $token=$_REQUEST["token"]; } else { $token=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	if (isset($_REQUEST["titulo"])) { $titulo=$_REQUEST["titulo"]; } else { $titulo=""; }
	if (isset($_REQUEST["director"])) { $director=$_REQUEST["director"]; } else { $director=""; }
	if (isset($_REQUEST["director2"])) { $director2=$_REQUEST["director2"]; } else { $director2=""; }
	if (isset($_REQUEST["seccion"])) { $seccion=$_REQUEST["seccion"]; } else { $seccion=""; }
	if (isset($_REQUEST["seccion2"])) { $seccion2=$_REQUEST["seccion2"]; } else { $seccion2=""; }
	if (isset($_REQUEST["categoria"])) { $categoria=$_REQUEST["categoria"]; } else { $categoria=""; }
	if (isset($_REQUEST["pais"])) { $pais=$_REQUEST["pais"]; } else { $pais=""; }
	if (isset($_REQUEST["pais2"])) { $pais2=$_REQUEST["pais2"]; } else { $pais2=""; }
	if (isset($_REQUEST["idioma"])) { $idioma=$_REQUEST["idioma"]; } else { $idioma=""; }
	if (isset($_REQUEST["idioma2"])) { $idioma2=$_REQUEST["idioma2"]; } else { $idioma2=""; }
	if (isset($_REQUEST["subs"])) { $subs=$_REQUEST["subs"]; } else { $subs=""; }
	if (isset($_REQUEST["valor"])) { $valor=$_REQUEST["valor"]; } else { $valor=""; }
	if (isset($_REQUEST["dia"])) { $dia=$_REQUEST["dia"]; } else { $dia=""; }
	if (isset($_REQUEST["mes"])) { $mes=$_REQUEST["mes"]; } else { $mes=""; }
	if (isset($_REQUEST["ano"])) { $ano=$_REQUEST["ano"]; } else { $ano=""; }
	if (isset($_REQUEST["estudio"])) { $estudio=$_REQUEST["estudio"]; } else { $estudio=""; }
	if (isset($_REQUEST["estudio2"])) { $estudio2=$_REQUEST["estudio2"]; } else { $estudio2=""; }
	if (isset($_REQUEST["texto"])) { $texto=$_REQUEST["texto"]; } else { $texto=""; }
	if (isset($_FILES["foto"]["tmp_name"])) { $foto=$_FILES["foto"]["tmp_name"]; } else { $foto=""; }
	if (isset($_FILES["archivo"]["tmp_name"])) { $archivo=$_FILES["archivo"]["tmp_name"]; } else { $archivo=""; }

	include("intranet.inc");
	$con=base_connect("intranet");

	$querySesion = "select usuario from sesiones where token='$token'";
	$qSesion = mysqli_query($con, $querySesion);
	while ($lele = mysqli_fetch_array($qSesion)) { $u = $lele[0]; }
	$queryUser = "select usuario from usuarios where uuid='$u'";
	$qUser = mysqli_query($con, $queryUser);
	while($lili = mysqli_fetch_array($qUser)) { $user = $lili[0]; }
	
	$estreno = $dia . "/" . $mes . "/" . $ano;
	
	if ($seccion=="nuevo") $seccion=$seccion2;
	if ($pais=="nuevo") $pais=$pais2;
	if ($director=="nuevo") $director=$director2;
	if ($estudio=="nuevo") $estudio=$estudio2;
	if ($idioma=="nuevo") $idioma=$idioma2;
	
	if ($foto) { move_uploaded_file($foto,"/videos/pics/" . $codigo); }
	if ($archivo) { move_uploaded_file($archivo,"/videos/" . $codigo . ".mp4"); }

	$queryModificar = "update videos_lista set titulo = '" . htmlspecialchars($titulo, ENT_QUOTES) . "', seccion='$seccion', categoria='$categoria', director='" . htmlspecialchars($director, ENT_QUOTES) . "', pais='$pais', idioma='$idioma', subtitulo='$subs', valor=$valor, estreno='$estreno', estudio='" . htmlspecialchars($estudio, ENT_QUOTES) . "', descripcion='" . htmlspecialchars($texto, ENT_QUOTES) . "', modificado=NOW() where codigo='$codigo'";
	$qModificar = mysqli_query($con, $queryModificar);
	
	$queryLimpiar = "update sesiones set codigo=NULL where token='$token'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);
	
	header('location: ../../../videos.php?t=' . $token . '&app=1');
?>
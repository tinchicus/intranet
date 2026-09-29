<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	if (isset($_REQUEST["tipo"])) { $tipo=$_REQUEST["tipo"]; } else { $tipo=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	switch($tipo)
	{
		case "serie":
		case "saga":
		case "lista":
			unlink("/videos/pics/" . $codigo);
			$queryEliminar = "delete from videos_series where codigo = '$codigo'";
			$qEliminar = mysqli_query($con, $queryEliminar);
			break;
		default:
			$queryEliminar = "delete from videos_lista where codigo = '$codigo'";
			$qEliminar = mysqli_query($con, $queryEliminar);
			unlink("/videos/pics/" . $codigo);
			unlink("/videos/" . $codigo . ".mp4");
	}
	
	$queryLimpiar = "delete from video_tube where codigo = '$codigo'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);
	
	header('location: ../../../videos.php?t=' . $t . '&app=1');
?>
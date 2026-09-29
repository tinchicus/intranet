<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["tipo"])) { $tipo=$_REQUEST["tipo"]; } else { $tipo=""; } 
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	if (!$tipo)
	{
		$queryCargar = "delete from sesiones where token='$t'";
		$qCargar = mysqli_query($con, $queryCargar);
		mysqli_close($con);
		header('location: ../../../sitio/');
	} else {
		$queryCargar = "update sesiones set codigo=NULL where token='$t'";
		$qCargar = mysqli_query($con, $queryCargar);
		mysqli_close($con);
		header('location: ../../?t=' . $t);	
	}
?>
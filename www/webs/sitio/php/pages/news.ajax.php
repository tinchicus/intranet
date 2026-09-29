<?php
	if (isset($_REQUEST["seccion"])) { $seccion=$_REQUEST["seccion"]; } else { $seccion=""; }

	include("intranet.inc");
	$con=base_connect("intranet");
	
	switch($seccion)
	{
		case 1:
			$queryNews = "select fecha, texto from news where tipo='Musica' order by codigo desc";
			break;
		case 2:
			$queryNews = "select fecha, texto from news where tipo='Videos' order by codigo desc";
			break;
		default:
			$queryNews = "select fecha, texto from news where tipo='Sitio' order by codigo desc";
			break;
	}
	$qNews = mysqli_query($con, $queryNews);
	$l = 0;
	while($lala = mysqli_fetch_array($qNews))
	{
		$fecha[$l] = $lala[0];
		$texto[$l] = $lala[1];
		$l++;
	}


	for($i=0; $i < $l; $i++)
	{
		echo $fecha[$i] . " - " . $texto[$i] . "<br>";
	}
?>

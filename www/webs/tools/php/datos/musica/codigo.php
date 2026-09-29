<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }

	$queryCodigo = "select codigo, filtro1_musica from sesiones where token='$t'";
	$qCodigo = mysqli_query($con, $queryCodigo);
	$sesion = new Datos();
	while($lala = mysqli_fetch_array($qCodigo))
	{
		$sesion->id = $lala[0];
		$sesion->tipo = $lala[1];
	}
?>
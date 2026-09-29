<?php
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");

	$queryNews = "select texto, fecha, tipo, creado, modificado, usuario from news where codigo='$codigo'";	
	$qNews = mysqli_query($con, $queryNews);
	while($lala = mysqli_fetch_array($qNews))
	{
		$texto = $lala[0];
		$fecha = $lala[1];
		$tipo = $lala[2];
		$creado = $lala[3];
		$modificado = $lala[4];
		$usuario = $lala[5];
	}
	
?>
<div style="position:relative; width:100%; height:100%; border:0px; border-spacing:0px; padding:0px; ">
	<div style=" position:relative; width:98%; height:60%; background-color:#fff; text-align:left; vertical-align:text-top; border:0px; border-spacing:0px; padding:5px; font-size:1.2em; overflow-x:hidden; overflow-y:auto; "><?= $texto; ?></div>
	<div style="position:relative; width:100%; height:25%; background-color:#fff; text-align:left; vertical-align:text-top; border:0px; border-spacing:0px; padding:5px; font-size:1.1em; ">
		<strong>Id: </strong><?= $codigo; ?>  -  <strong>Fecha: </strong><?= $fecha; ?>  -  <strong>Creado:</strong> <?= $creado; ?>  -  <strong>Ult. Modificacion:</strong> <?= $modificado; ?>  -  <strong>Usuario:</strong> <?= $usuario; ?>
	</div>
	<div style="position:relative; width:100%; height:15%; background-color:#fff; text-align:center; vertical-align:middle; border:0px; border-spacing:0px; padding:0px; "><button id="boton-cerrar-ver" type="button" onClick="cerrar_info()" style="width:50%; height:40%; cursor:pointer; ">Cerrar</button></div>
</div>


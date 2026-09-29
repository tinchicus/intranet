<?php
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");

	class Datos
	{
		public $codigo;
		public $titulo;
		public $seccion;
		public $categoria;
		public $texto;
		public $foto;
		public $archivo;
		public $track;
		public $creado;
		public $modificado;
		public $user_id;
		public $tipo;
	}
	
	$datos = new Datos();
	$queryTipo = "select tipo from video_tube where codigo='$codigo'";
	$qTipo = mysqli_query($con, $queryTipo);
	while($lala = mysqli_fetch_array($qTipo)) { $datos->tipo = $lala[0]; }
	$queryDatos="select distinct titulo, seccion, categoria, texto, foto, creado, modificado, usuario from videos_series where codigo='$codigo'";
	$qDatos = mysqli_query($con, $queryDatos);
	while($lele = mysqli_fetch_array($qDatos))
	{
		$datos->titulo = $lele[0];
		$datos->seccion = $lele[1];
		$categ = $lele[2];
		$datos->texto = $lele[3];
		$datos->foto = $lele[4];
		$datos->creado = $lele[5];
		$datos->modificado = $lele[6];
		$datos->usuario = $lele[7];
		switch($categ)
		{
			case "0":
				$datos->categoria="ATP";
				break;
			case "13":
				$datos->categoria="PM13";
				break;
			case "16":
				$datos->categoria="PM16";
				break;
			case "18":
				$datos->categoria="PM18";
				break;
			case "18p":
				$datos->categoria="PM18/R";
				break;
		}
	}
	
	$p = 0;
	$pelis = Array();
	$queryPelis = "select archivo from videos_series where codigo = '$codigo' order by track asc";
	$qPelis = mysqli_query($con, $queryPelis);
	while($lili = mysqli_fetch_array($qPelis))
	{
		$peli[$p] = new Datos();
		$peli[$p]->archivo = $lili[0];
		$queryData = "select titulo, foto from videos_lista where archivo='" . $peli[$p]->archivo . "'";
		$qData = mysqli_query($con, $queryData);
		while($lolo = mysqli_fetch_array($qData))
		{
			$peli[$p]->titulo = $lolo[0];
			$peli[$p]->foto = $lolo[1];
		}
		array_push($pelis, $peli[$p]);
		$p++;
	}
?>
<div style="position:absolute; left:2%; top:2%; width:96%; height:90%; overflow-x:hidden; overflow-y:auto;">
	<div style="position:relative; width:100%; height:250; background-color:#000000; background-image:url(../../videos/pics/<?= $datos->foto ? $datos->foto : "foto01.jpeg"; ?>); background-position:center; background-size:cover; "></div>
	<div style="position:relative; display:table; width:100%; height:30; background-color:#fff; text-align:center; border:0px; border-spacing:0px; padding:0px;">
		<div style="display:table-cell; height:100%; text-align:left; vertical-align:middle; font-size:1.3em; font-weight:bold; border:0px; border-spacing:0px; padding:2px; "><?= $datos->titulo; ?></div>
	</div>
	<div style="position:relative; display:table; width:100%; height:10;  ">
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; width:20%; text-align:right; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; ">Seccion:</div>
			<div style="display:table-cell; width:80%; text-align:left; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; "><?= $datos->seccion; ?></div>
		</div>
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; width:20%; text-align:right; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; ">Categoria:</div>
			<div style="display:table-cell; width:80%; text-align:left; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; "><?= $datos->categoria; ?></div>
		</div>
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; width:20%; text-align:right; vertical-align:top; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; ">Descripcion:</div>
			<div style="display:table-cell; width:80%; text-align:left; vertical-align:top; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; "><?= $datos->texto; ?></div>
		</div>
	</div>
	<div style="position:relative; display:table; width:100%; height:30; background-color:#fff; text-align:center; border:0px; border-spacing:0px; padding:0px;">
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; height:100%; text-align:left; vertical-align:middle; font-size:1.3em; font-weight:bold; border:0px; border-spacing:0px; padding:2px; ">Datos del log</div>
		</div>
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; height:100%; text-align:left; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:2px; ">
			<strong>ID:</strong> <?= $codigo; ?> - <strong>Creado:</strong> <?= $datos->creado; ?> - <strong>Ult. Modificacion:</strong> <?= $datos->modificado; ?> - <strong>Usuuaio:</strong> <?= $datos->usuario; ?>
			</div>
		</div>
	</div>
	<div style="position:relative; display:table; width:100%; height:10;  ">
		<?php foreach($pelis as $l) { ?>
		<div style="display:table-row; height:150; ">
			<div style="display:table-cell; width:100%; text-align:right; vertical-align:bottom; border:0px; border-spacing:0px; padding:1px; background-image:url(../../videos/pics/<?= $l->foto ? $l->foto : "foto01.jpeg"; ?>); background-position:center; background-size:cover;  ">
				<span style=" font-size:1.2em; font-weight:bold; background-color:#000000; color:#FFFFFF; "><?= $l->titulo;  ?></span>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<div style="position:absolute; left:2%; top:92%; width:96%; height:6; background-color:#fFF; text-align:center;  border:0px; border-spacing:0px; padding:3px; ">
	<button type="button" onClick="cerrar_info()" style="cursor:pointer; width:200; ">Cerrar</button>
</div>
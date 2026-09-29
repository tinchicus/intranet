<?php
	if (isset($_REQUEST["codigo"])) { $codigo=$_REQUEST["codigo"]; } else { $codigo=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");
	
	$queryDatos = "select titulo, seccion, categoria, ano, director, pais, idioma, subtitulo, valor, estreno, estudio, descripcion, trailer, foto, archivo, recomiendo, creado, modificado, usuario from videos_lista where codigo='$codigo'";
	$qDatos = mysqli_query($con, $queryDatos);
	while($lala = mysqli_fetch_array($qDatos))
	{
		$titulo = $lala[0];
		$seccion = $lala[1];
		$categ = $lala[2];
		$ano = $lala[3];
		$director = $lala[4];
		$pais = $lala[5];
		$idioma = $lala[6];
		$subs = $lala[7];
		$valor = $lala[8];
		$estreno = $lala[9];
		$estudio = $lala[10];
		$texto = $lala[11];
		$trailer = $lala[12];
		$foto = $lala[13];
		$archivo = $lala[14];
		$recomiendo = $lala[15];
		$creado = $lala[16];
		$modificado = $lala[17];
		$user = $lala[18];
		switch($categ)
		{
			case "0":
				$categoria="ATP";
				break;
			case "13":
				$categoria="PM13";
				break;
			case "16":
				$categoria="PM16";
				break;
			case "18":
				$categoria="PM18";
				break;
			case "18p":
				$categoria="PM18/R";
				break;
		}
	}
?>
<div style="position:absolute; left:2%; top:2%; width:96%; height:90%; overflow-x:hidden; overflow-y:auto;">
	<div style="position:relative; width:100%; height:250; background-color:#000000; ">
		<video id="vhs" src="../../videos/<?= $archivo; ?>" poster="../../videos/pics/<?= $foto; ?>" controls style="width:100%; height:100%;"></video>	
	</div>
	<div style="position:relative; display:table; width:100%; height:30; background-color:#fff; text-align:center; border:0px; border-spacing:0px; padding:0px;">
		<div style="display:table-cell; height:100%; text-align:left; vertical-align:middle; font-weight:bold; font-size:1.2em; border:0px; border-spacing:0px; padding:2px; "><?= $titulo; ?></div>
	</div>
	<div style="position:relative; display:table; width:100%; height:10;  ">
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; width:20%; text-align:right; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; ">Director:</div>
			<div style="display:table-cell; width:80%; text-align:left; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; "><?= $director; ?></div>
		</div>
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; width:20%; text-align:right; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; ">Seccion:</div>
			<div style="display:table-cell; width:80%; text-align:left; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; "><?= $seccion; ?></div>
		</div>
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; width:20%; text-align:right; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; ">Categoria:</div>
			<div style="display:table-cell; width:80%; text-align:left; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; "><?= $categoria; ?></div>
		</div>
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; width:20%; text-align:right; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; ">Estreno:</div>
			<div style="display:table-cell; width:80%; text-align:left; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; "><?= $estreno; ?></div>
		</div>
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; width:20%; text-align:right; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; ">Estudio:</div>
			<div style="display:table-cell; width:80%; text-align:left; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; "><?= $estudio; ?></div>
		</div>
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; width:20%; text-align:right; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; ">Pais:</div>
			<div style="display:table-cell; width:80%; text-align:left; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; "><?= $pais; ?></div>
		</div>
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; width:20%; text-align:right; vertical-align:middle; border:0px; border-spacing:0px; padding:1px; ">Idioma:</div>
			<div style="display:table-cell; width:80%; text-align:left; vertical-align:middle; border:0px; border-spacing:0px; padding:1px; "><?= $idioma;?></div>
		</div>
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; width:20%; text-align:right; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; ">Subs:</div>
			<div style="display:table-cell; width:80%; text-align:left; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; "><?= $subs;?></div>
		</div>
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; width:20%; text-align:right; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; ">Valor:</div>
			<div style="display:table-cell; width:80%; text-align:left; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; "><?= $valor; ?></div>
		</div>
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; width:20%; text-align:right; vertical-align:top; font-size:1.2em; border:0px; border-spacing:0px; padding:1px; ">Descripcion:</div>
			<div style="display:table-cell; width:80%; text-align:left; vertical-align:top; font-size:1.2em;  border:0px; border-spacing:0px; padding:1px; "><?= $texto; ?></div>
		</div>
	</div>
	<div style="position:relative; display:table; width:100%; height:30; background-color:#fff; text-align:center; border:0px; border-spacing:0px; padding:0px;">
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; height:100%; text-align:left; vertical-align:middle; font-weight:bold; font-size:1.2em; border:0px; border-spacing:0px; padding:2px; ">Datos del log</div>
		</div>
		<div style="display:table-row; height:30; ">
			<div style="display:table-cell; height:100%; text-align:left; vertical-align:middle; font-size:1.2em; border:0px; border-spacing:0px; padding:2px; ">
			<strong>ID:</strong> <?= $codigo; ?> - <strong>Creado:</strong> <?= $creado; ?> - <strong>Ult. Modificacion:</strong> <?= $modificado?> - <strong>Trailer:</strong> <?= $trailer; ?> - <strong>Recomiendo:</strong> <?= $recomiendo; ?> - <strong>Usuuaio:</strong> <?= $user; ?>
			</div>
		</div>
	</div>
</div>
<div style="position:absolute; left:2%; top:92%; width:96%; height:6; background-color:#fFF; text-align:center;  border:0px; border-spacing:0px; padding:3px; ">
	<button type="button" onClick="cerrar_info()" style="cursor:pointer; width:200; ">Cerrar</button>
</div>

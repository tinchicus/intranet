<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["id"])) { $id=$_REQUEST["id"]; } else { $id=""; }

	include("intranet.inc");
	$con=base_connect("intranet");	
	
	$queryLista = "SELECT frases.id_autor, frases.texto, frases.creado, frases.modificado, frases.usuario, frases_autor.nombre, frases_autor.apellido, frases_autor.foto FROM intranet.frases, intranet.frases_autor where frases_autor.codigo = frases.id_autor and frases.id=$id order by frases.creado desc";
	$qLista = mysqli_query($con, $queryLista);
	while($lala = mysqli_fetch_array($qLista))
	{
		$id_autor = $lala[0];
		$texto = $lala[1];
		$creado = $lala[2];
		$modificado = $lala[3];
		$usuario = $lala[4];
		$nombre = $lala[5];
		$apellido = $lala[6];
		$foto = $lala[7];
	}

?>
<div id="capa-ajax-frase-foto" style=" background-image:url(../frases/<?= $foto ? $foto : "fondo.png"; ?>);  ">
	<table style="width:100%; height:100%; border:0px; border-spacing:0px; padding:0px; ">
		<tr><td style="height:40%; "></td></tr>
		<tr>
			<td class="td_ajax_frase_texto" style=" ">
			<?= $nombre; ?> <?= $apellido; ?> (<?= $id_autor; ?>):<br>
			<?= $texto; ?>
			</td>
		</tr>
	</table>
</div>
<div id="capa-ajax-frase-datos">
	<strong>ID:</strong> <?= $id; ?> -- <strong>Creado:</strong> <?= $creado; ?> -- <strong>Ult. Modificacion:</strong> <?= $modificado; ?> -- <strong>Modificado por:</strong> <?= $usuario; ?>
</div>
<div id="capa-ajax-frase-cerrar">
	<button type="button" class="boton_cerrar" onClick="cerrar_info()">Cerrar</button>
</div>
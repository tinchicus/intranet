<?php
	if (isset($_REQUEST["token"])) { $t=$_REQUEST["token"]; } else { $t=""; }
	if (isset($_REQUEST["texto"])) { $texto=$_REQUEST["texto"]; } else { $texto=""; }
	if (isset($_REQUEST["autor"])) { $autor=$_REQUEST["autor"]; } else { $autor=""; }
	if (isset($_REQUEST["nombre"])) { $nombre=$_REQUEST["nombre"]; } else { $nombre=""; }
	if (isset($_REQUEST["apellido"])) { $apellido=$_REQUEST["apellido"]; } else { $apellido=""; }
	if (isset($_REQUEST["pais"])) { $pais=$_REQUEST["pais"]; } else { $pais=""; }
	if (isset($_REQUEST["pais2"])) { $pais2=$_REQUEST["pais2"]; } else { $pais2=""; }
	if (isset($_FILES["foto"]["tmp_name"])) { $foto=$_FILES["foto"]["tmp_name"]; } else { $foto=""; }

	include("intranet.inc");
	$con=base_connect("intranet");
	
	$querySesion = "select usuario from sesiones where token='$t'";
	$qSesion = mysqli_query($con, $querySesion);
	while ($lele = mysqli_fetch_array($qSesion)) { $u = $lele[0]; }
	$queryUser = "select usuario from usuarios where uuid='$u'";
	$qUser = mysqli_query($con, $queryUser);
	while($lili = mysqli_fetch_array($qUser)) { $user = $lili[0]; }

	if ($autor == "nuevo")
	{
		$queryCodigo = "select codigo from frases_autor order by codigo asc";
		$qCodigo = mysqli_query($con, $queryCodigo);
		while($lala = mysqli_fetch_array($qCodigo)) { $autor_id = $lala[0]; }
		if (!$autor_id)
		{
			$autor_id = "ID1000000000";
		} else {
			$autor_id++;
		}
		if ($_FILES["foto"]["tmp_name"]) 
		{
			move_uploaded_file($_FILES["foto"]["tmp_name"],"/www/webs/frases/" . $autor_id);
			$fotito = $autor_id;
		} else {
			$fotito = "";
		}
		if ($pais=="nuevo") $pais = $pais2;
		$autor = $autor_id;

		$queryAutor = "insert into frases_autor(id,codigo,nombre,apellido,foto,pais,creado,modificado,usuario) values (NULL,'$autor','" . htmlspecialchars($nombre, ENT_QUOTES) . "','" . htmlspecialchars($apellido, ENT_QUOTES) . "','$fotito','$pais',NOW(),NOW(),'$user')";
		$qAutor = mysqli_query($con, $queryAutor);
	}
	
	$queryFrase = "insert into frases (id, id_autor, texto, creado, modificado, usuario) values (NULL, '$autor', '" . htmlspecialchars($texto, ENT_QUOTES) . "', NOW(), NOW(), '$user')";
	$qFrase = mysqli_query($con, $queryFrase);
	$queryLimpiar = "update sesiones set codigo=NULL where token='$t'";
	$qLimpiar = mysqli_query($con, $queryLimpiar);
	
	header('location: ../../../frases.php?t=' . $t . '&app=1');
?>
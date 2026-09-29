<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<link rel="stylesheet" href="css/player.css" type="text/css"/>
<link rel="stylesheet" href="css/lista.css" type="text/css"/>
<link rel="stylesheet" href="css/datos.css" type="text/css"/>
<link rel="stylesheet" href="css/controles.css" type="text/css"/>
<link rel="stylesheet" href="css/menu.css" type="text/css"/>
<link rel="stylesheet" href="css/playlists.css" type="text/css"/>
<?php

	require "php/datos/clases.php";
	require "php/datos/datos.php";
	require "php/pages/menu.php";
	require "php/pages/controles.php";
	require "php/pages/datos.php";
	require "php/pages/lista.php";
	require "php/pages/playlist.php";
?>
<title><?= $cancion->artista; ?> - <?= $cancion->titulo; ?></title>
<script language="javascript" src="js/player.js"></script>
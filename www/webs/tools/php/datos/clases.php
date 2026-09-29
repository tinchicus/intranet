<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["app"])) { $app=$_REQUEST["app"]; } else { $app=""; }
	
	include("intranet.inc");
	
	class Usuario
	{
		public $userid;
		public $nombre;
		public $apellido;
		public $email;
		public $rol;
	}	
?>
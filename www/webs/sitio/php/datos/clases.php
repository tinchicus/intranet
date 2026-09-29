<?php

	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }

	include("intranet.inc");
	
	class Datos
	{
		public $foto;
		public $texto;
		public $fecha;
		public $artista;
		public $titulo;
		public $genero;
		public $pais;
		public $ano;
		public $disco;
		public $archivo;
		public $codigo;
		public $autor;
		public $codex;
		public $tipo;
	}
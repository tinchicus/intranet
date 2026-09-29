<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }

	include("intranet.inc");

	class Datos
	{
		public $tipo;
		public $codigo;
		public $track;
		public $archivo;
		public $artista;
		public $titulo;
		public $pais;
		public $genero;
		public $ano;
		public $foto;
		public $disco;
	}
	class Filtros
	{
		public $filtro1;
		public $filtro2;
		public $orden;
		public $codigo;
		public $track;
	}
	class Objeto
	{
		public $filtro1;
		public $filtro2;
		public $codigo;
		public $tipo;
		public $track;
	}

?>
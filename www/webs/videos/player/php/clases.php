<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["alto"])) { $alto=$_REQUEST["alto"]; } else { $alto=""; }

	include("intranet.inc");

	class Filtros
	{
		public $codigo;
		public $filtro1;
		public $filtro2;
		public $orden;
		public $track;
	};
	
	class Proximo
	{
		public $codigo;
		public $track;
		public $tipo;
	}

	class Datos
	{
		public $codex;
		public $titulo;
		public $seccion;
		public $categoria;
		public $director;
		public $pais;
		public $idioma;
		public $subtitulo;
		public $estudio;
		public $valor;
		public $estreno;
		public $foto;
		public $video;
		public $texto;
		public $ano;
		public $tipo;
		public $archivo;
	};
?>
<?php
	if (isset($_REQUEST["t"])) { $t=$_REQUEST["t"]; } else { $t=""; }
	if (isset($_REQUEST["ancho"])) { $ancho=$_REQUEST["ancho"]; } else { $ancho=""; }
	if (isset($_REQUEST["alto"])) { $alto=$_REQUEST["alto"]; } else { $alto=""; }
	if (isset($_REQUEST["ventana"])) { $ventana=$_REQUEST["ventana"]; } else { $ventana=""; }

	include("intranet.inc");

	class Total
	{
		public $valor;
	};
	class Filtros
	{
		public $codigo;
		public $filtro1;
		public $filtro2;
		public $tipo;
		public $track;
	};
	class Categoria
	{
		public $titulo;
		public $valor;
	};
	class Objeto
	{
		public $nombre;
	};	
	class Datos
	{
		public $archivo;
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
		public $track;
	};
?>
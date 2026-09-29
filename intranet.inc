<?php 
	function base_connect($base) 
	{ 
		$con=@mysqli_connect("localhost", 
				"< usuario_conexion >", 
				"< clave_usuario >", 
				$base) or 
                                exit;
                return($con);
        }
?>

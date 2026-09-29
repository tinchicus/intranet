<?php 
	function base_connect($base) 
	{ 
		$con=@mysqli_connect("localhost", 
				"tinchicus", 
				"tincho", 
				$base) or 
                                exit;
                return($con);
        }
?>

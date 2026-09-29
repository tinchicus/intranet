<?php
	if (isset($_REQUEST["token_rst"])) { $t=$_REQUEST["token_rst"]; } else { $t=""; }
	if (isset($_REQUEST["uuid_rst"])) { $u=$_REQUEST["uuid_rst"]; } else { $u=""; }
	if (isset($_REQUEST["pass1_rst"])) { $clave=$_REQUEST["pass1_rst"]; } else { $clave=""; }
	
	include("intranet.inc");
	$con=base_connect("intranet");

	$user="";
	$queryCheck = "select usuario from usuarios where token_tools='$t'";
	$qCheck = mysqli_query($con, $queryCheck);
	while($lala = mysqli_fetch_array($qCheck)) { $user = $lala[0]; }

	if ($user) 
	{	
		$pass = password_hash($clave, PASSWORD_DEFAULT,['cost'=>12]);
		$queryReset = "update usuarios set clave='$pass' where uuid='$u'";
		$qReset = mysqli_query($con, $queryReset);
		header('location: ../../../users.php?t=' . $t . '&app=1');
	} else {
		header('location: ../../../login.html');
	}
?>
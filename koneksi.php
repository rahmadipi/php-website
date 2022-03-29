<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbnm = "rpdatabase";
	$rp = mysql_connect ($host, $user, $pass);
	if($rp){
		$buka = mysql_select_db ($dbnm);
		if(!$buka){
			die("Database tidak dapat dibuka");
		}
	}
	else{
		die("Server MySQL tidak terhubung");
	}
?>
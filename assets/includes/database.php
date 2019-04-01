<?php
	function getConnection() {
		$username = "root"; $password = "";
		//$username = "bluelife";	$password = "NTC0403196512177";
		//mysql16.redehost.com.br

		$con = new PDO('mysql:host=localhost;dbname=kali', $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        return $con;
	}

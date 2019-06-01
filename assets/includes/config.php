<?php

	// Functions
	function getConnectionDB() {
		$username = "root"; $password = "Pass@word";
		$con = new PDO('mysql:host=localhost;dbname=kali', $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        return $con;
	}

	session_start(); 
	 
	// Verifica se existe os dados da sessão de login 
	if (!isset($_SESSION["host"]) || !isset($_SESSION["user"]) || !isset($_SESSION["password"])) { 
		header("Location: login.php"); 
	} else {
		$name = $_SESSION["user"];
		$avatar = "assets/img/profile.jpg";
		$background = "assets/img/background.jpg";
	}

?>
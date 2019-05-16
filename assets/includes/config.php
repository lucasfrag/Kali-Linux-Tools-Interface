<?php
	// User settings
	$name = "Lucas Fraga";
	$avatar = "assets/img/profile.jpg";
	$background = "assets/img/background.jpg";

	/*
	BACKGROUND SETTINGS

	You can use your own background setting the URL

	OR

	You can use the background colors from Argon's Theme.
	Just add the class to the first div after   <!-- Header --> commentary on header.php

	Example:
	bg-gradient-primary

	*/

 	// Kali Linux settings
	$server = "localhost";	// Your Kali Linux IP Address
	$user = "kali";		// User to connect
	$password = "toor";			// Password


	// Functions
	function getConnectionDB() {
		$username = "root"; $password = "Pass@word";
		$con = new PDO('mysql:host=localhost;dbname=kali', $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        return $con;
	}

?>
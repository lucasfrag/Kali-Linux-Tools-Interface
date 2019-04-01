<?php
	// Connections (Database, SSH)

	function getConnectionDB() {
		$username = "root"; $password = "";
		$con = new PDO('mysql:host=localhost;dbname=kali', $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        return $con;
	}

	function getConnectionSSH() {
		set_include_path('assets/libraries/phpseclib/');
		include('Net/SSH2.php');

		$server = "192.168.0.15";	// Your Kali Linux IP Address
		$user = "synysterfury";		// User to connect
		$password = "toor";			// Password

		$ssh = new Net_SSH2($server);

		if (!$ssh->login($user, $password)) {
		    exit('Login Failed');
		}
		return $ssh;
	}

	// SSH Functions
	function packet_handler($str) {
    	echo $str;
    	flush();
    	ob_flush();
	}
?>

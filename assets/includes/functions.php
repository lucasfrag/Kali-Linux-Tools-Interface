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
			echo 
				"<div class='alert alert-danger alert-dismissible fade show' role='alert' style='position: fixed; bottom: 0; right: 0; width: 50%;'>
 			   		<span class='alert-inner--icon'><i class='ni ni-fat-remove'></i></span>
    				<span class='alert-inner--text'><strong>Connection to operating system failed!</strong></span>
    				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        				<span aria-hidden='true'>&times;</span>
    				</button>
				</div>";
		} else {
			echo
				"<div class='alert alert-success alert-dismissible fade show' role='alert' style='position: fixed; bottom: 0; right: 0; width: 50%;'>
 			   		<span class='alert-inner--icon'><i class='ni ni-like-2'></i></span>
    				<span class='alert-inner--text'><strong>Connection to operating system failed!</strong></span>
    				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        				<span aria-hidden='true'>&times;</span>
    				</button>
				</div>";			
		}
	}
?>

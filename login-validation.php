<?php
	session_start();
	session_destroy();
	$host = $_POST["host"];
	$user = $_POST["user"];
	$password = $_POST["password"];

	set_include_path('assets/libraries/phpseclib/');
	include('Net/SSH2.php');
	include('assets/includes/config.php');

	$ssh = new Net_SSH2($host);

	if (!$ssh->login($user, $password)) {
		echo "<script> alert('Erro! Connecting via SSH to your host failed!'); window.location.href = 'login.php'</script>"; 
	} else {

		$_SESSION["host"]= $host;
        $_SESSION["user"] = $user;
        $_SESSION["password"]= $password;
		
		header("Location: index.php");
	}

?>

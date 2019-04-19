<?php
	$command = $_POST['command'];
	$target = $_POST['target'];
	$commands = array($_POST['commands']);

	set_include_path('assets/libraries/phpseclib/');
	include('Net/SSH2.php');
	include('assets/includes/config.php');


	$ssh = new Net_SSH2($server);

	if (!$ssh->login($user, $password)) {
			echo 
				"<div class='alert alert-danger alert-dismissible fade fade.in show' role='alert' style='position: fixed; z-index: 2; bottom: 0; right: 0; width: 50%;'>
 			   		<span class='alert-inner--icon'><i class='ni ni-fat-remove'></i></span>
    				<span class='alert-inner--text'><strong>Connection to operating system failed!</strong></span>
    				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        				<span aria-hidden='true'>&times;</span>
    				</button>
				</div>";
	} else {

		$cmd = $command ." ". $target;

		echo $ssh->exec($cmd, 'packet_handler');
	}

	function packet_handler($str) {
		echo '<pre style="color: white">' . $str . '</pre>';
		flush();
		ob_flush();
	}

?>

<script type="text/javascript">
	$(".alert").delay(10000).animate({ opacity: 1 }, 700);​
</script>
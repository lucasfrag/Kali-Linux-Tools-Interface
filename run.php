<?php
	// Set time limit to PHP(seconds)
	set_time_limit(180);

	$command = $_POST['command'];
	$target = $_POST['target'];
	$arrayInputs = $_POST['arrayInputs'];
	$arrayCheckbox = $_POST['arrayCheckbox'];
	
	$cmd = "";

	set_include_path('assets/libraries/phpseclib/');
	include('Net/SSH2.php');
	include('assets/includes/config.php');

	$ssh = new Net_SSH2($server);
	
	if (!$ssh->login($user, $password)) {
			echo 
				"<div class='alert alert-danger alert-dismissible fade fade.in show' role='alert' style='position: fixed; z-index: 2; bottom: 0; right: 0; width: 40%;'>
 			   		<span class='alert-inner--icon'><i class='ni ni-fat-remove'></i></span>
    				<span class='alert-inner--text'><strong>Error!</strong> Connection to operating system failed!</span>
    				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        				<span aria-hidden='true'>&times;</span>
    				</button>
				</div>";
	} else {

		// Get all the inputs firt
		for ($i = 0; sizeof($arrayInputs) > $i; $i++) {
			$cmd = $cmd . " " . $arrayInputs[$i][0] . " " . $arrayInputs[$i][1];
		}

		for ($i = 0; sizeof($arrayCheckbox) > $i; $i++) {
			$cmd = $cmd . " " . $arrayCheckbox[$i];
		}

		$run = $command . " " . $cmd . " " . $target;
		echo "<style='color: white'>The following command was executed: <b>" . $run . "</b>";
		
		$ssh->setTimeout(0);
		
		$ssh->exec("echo $password | sudo -S " . $run, 'packet_handler');

		echo
		"<div id='output' class='alert alert-success alert-dismissible fade show' role='alert' style='position: fixed; z-index: 2; bottom: 0; right: 0; width: 40%;'>
		   	<span class='alert-inner--icon'><i class='ni ni-fat-checked'></i></span>
			<span class='alert-inner--text'><strong>Success!</strong> 
Command executed successfully.</span>
			
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
			</button>
		</div>";
	}

	function packet_handler($str) {
		echo '<pre style="color: white">' . $str . '</pre>';
		flush();
		ob_flush();
	}
?>
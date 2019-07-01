<?php

	$id = $_GET['id'];

	require("assets/includes/config.php"); 

	$con = getConnectionDB() or die ("Could not connect to database.");
	$sql = $con->prepare("DELETE FROM reports WHERE id = '$id' ");

	if ($sql->execute()) {
		echo "<script> alert('Report removed successfully.');</script>";
	} else {

		echo "<script> alert('Error removing report. Please try again.');</script>";

	}

	echo "<script>window.location.href = 'reports.php'</script>";
?>
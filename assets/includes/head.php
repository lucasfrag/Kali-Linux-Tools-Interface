<head>
    <title>Kali Linux Tools Interface</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">

	<!-- Custom CSS Import -->
	<link rel="stylesheet" type="text/css" href="assets/css/timeline.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<?php
    include ("assets/includes/connections.php"); 
    $con = getConnectionDB() or die ("Could not connect to database.");
    $ssh = getConnectionSSH() or die ("Could not connect to Kali Linux.");
?>
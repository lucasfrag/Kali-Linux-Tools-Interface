<!DOCTYPE html>
<html>
  <?php 
  	include("assets/includes/head.php"); 
    $id = $_GET['id'];
  ?>
<body>
	<?php
		include("assets/includes/header.php")
	?>

	<!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          	<div class="card shadow">
	            <div class="card-header bg-transparent">
	              <h2 class="mb-0">Reports</h2>
	            </div>
            	
            	<div class="card-body">
                <div class="row">
            		<div class="col">

              <?php
                $con = getConnectionDB() or die ("Could not connect to database.");
                $sql = $con->prepare("SELECT * FROM reports WHERE id = $id;");
                $sql->execute();

                $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
                // FOREACH BEGINS
                foreach ($resultados as $resultado) {
                  $name = $resultado['name'];
                  $tools = $resultado['tools'];
                  $command = $resultado['command'];
                  $output = $resultado['output'];
                  $solution = $resultado['solution'];
                  $dataOld = $resultado['dataHour'];
                  $dataHour = date ("d F Y - H:i", strtotime($dataOld));
              ?>
              <h1><?php echo $name; ?></h1>
              <span>
                <?php echo $tools; ?> </span><br><br>
                Scan carried out on <span><?php echo $dataHour; ?>hrs <br><br>
                Command executed:<b> <?php echo $command; ?></b>

                <br>
              </span>

              <br>
              <h2>Terminal Output</h2>
              <p>
                <pre><?php echo $output; ?></pre>
              </p>

              <h2>Solution</h2>
               <p>
                <?php echo $solution; ?>
              </p>

            </div>

					<?php } ?>
        </div>
				</div>
			</div>
	<?php
		include("assets/includes/footer.php")
	?>
</body>
</html>
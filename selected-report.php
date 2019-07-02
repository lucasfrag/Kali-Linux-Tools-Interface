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

              <div class="row mt-3">
                <div class="col">  
                  <div class="terminal" id="terminal" >
                    <div class="card card-body text-white bg-dark">
                      
                      <h2 class="card-title text-white"><i class="ni ni-bold-right"></i> Terminal</h2>            

                      <p class="card-text"><pre class="text-white"><?php echo $output; ?></pre></p>


                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">  
                  <div class="solution" id="solution" >
                    <div class="card card-body text-white bg-success">
                      
                      <h2 class="card-title text-white"><i class="ni ni-bold-right"></i> Solution</h2>            

                      <p class="card-text"><?php echo $solution; ?></p>


                    </div>
                  </div>
                </div>
              </div>

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
<!DOCTYPE html>
<html>
  <?php 
  	include("assets/includes/head.php"); 
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
                <div class="row icon-examples">

              <?php
                $con = getConnectionDB() or die ("Could not connect to database.");
                $sql = $con->prepare("SELECT id, name, tools, dataHour FROM reports ORDER BY dataHour DESC;");
                $sql->execute();

                $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
                // FOREACH BEGINS
                foreach ($resultados as $resultado) {
                  $id = $resultado['id'];
                  $name = $resultado['name'];
                  $tools = $resultado['tools'];
                  $command = $resultado['command'];
                  $output = $resultado['output'];
                  $solution = $resultado['solution'];
                  $dataOld = $resultado['dataHour'];
                  $dataHour = date ("d F Y - H:i", strtotime($dataOld));


              ?>
				<div class="col-xl-6 col-lg-6">
                    <div class="card card-stats zoom-effect">
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0"><?php echo $tools; ?></h5>
                            <span class="h3 font-weight-bold mb-0">
                              <?php echo $name; ?><br>
                             </span>
                             <br><p><b>Datetime:</b> <?php echo $dataHour; ?>hrs</p>
                          </div>
                          <div class="col-auto">
                            <div class="icon icon-shape text-white rounded-circle shadow" style="background-image: url('assets/img/logo.png'); background-size: cover;">
                            </div>
                          </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                        </p>

                        <?php echo "<a href='selected-report.php?id=$id' style='text-decoration: none;' class='btn btn-info'>+ Show details</a>" ?>
                      </div>
                    </div>
                  </div>

					<?php }           ?>

				</div>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">
        <i class="fa fa-angle-left"></i>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>

    <li class="page-item">
      <a class="page-link" href="#">
        <i class="fa fa-angle-right"></i>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
      </div>


    </div>
	<?php
		include("assets/includes/footer.php")
	?>
</body>
</html>
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
	              <h2 class="mb-0">Dashboard</h2>
	            </div>
            	
            	<div class="card-body">
            		<div class="row icon-examples">
						<div class="col-sm-12 col-md-6 col-lg-4">
							<?php
								echo $ssh->exec('pwd');
							?>
						</div>
					</div>
				</div>
			</div>
	<?php
		include("assets/includes/footer.php")
	?>
</body>
</html>
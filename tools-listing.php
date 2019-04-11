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
	              <h2 class="mb-0">Kali Linux Tools Listing</h2>
	            </div>
            	
            	<div class="card-body">
            		<div class="row icon-examples">
						<?php
							$con = getConnectionDB() or die ("Could not connect to database.");
							$sql = $con->prepare("SELECT id, name, categories, released  FROM tools ORDER BY name;");
							$sql->execute();
							$resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
							// FOREACH BEGINS
							foreach ($resultados as $resultado) {
								$id = $resultado['id'];
								$name = $resultado['name'];
								$categories = $resultado['categories'];
								$released = $resultado['released'];
						?>

						<div class="col-sm-12 col-md-6 col-lg-4">
							
								<?php 
									if(is_null($released)) {
										echo "
											<div class='card zoom-effect border-primary mb-3'>
												<div class='card-body'>
											    	<p>$name</p>
											    	<p class='card-subtitle mb-2'>$categories</p>
											  	</div>
											</div>
										";
									} else  {
										echo "
											<a href='selected-tool.php?id=$id' style='text-decoration: none;'>
												<div class='card zoom-effect bborder-success mb-3 text-white bg-success'>
													<div class='card-body'>
												    	<p>$name</p>
												    	<p class='card-subtitle mb-2'>$categories</p>
												  	</div>
												</div>
											</a>
										";
									}
								?>

						</div>
				
						<?php
						// FOREACH ENDS
								}
						?>
					</div>
				</div>
			</div>
	<?php
		include("assets/includes/footer.php")
	?>
</body>
</html>
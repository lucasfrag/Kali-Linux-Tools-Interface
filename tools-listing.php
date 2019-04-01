<!DOCTYPE html>
<html>
  <?php 
  	include("assets/includes/head.php"); 

  	// Conexão com banco de dados
    include ("assets/includes/database.php"); 
    $con = getConnection() or die ("Não é possível conectar-se ao servidor.");
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
							$sql = $con->prepare("SELECT nome, logo, categoria, url FROM tools ORDER BY nome;");
							$sql->execute();
							$resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

							// FOREACH BEGINS
							foreach ($resultados as $resultado) {
								$nome = $resultado['nome'];
								$logo = $resultado['logo'];
								$categoria = $resultado['categoria'];
								$url = $resultado['url'];
						?>

						<div class="col-sm-12 col-md-6 col-lg-4">
							<a href="<?php echo $url; ?>" style="text-decoration: none;">
								<?php 
									if(is_null($url)) {
										echo "<div class='card zoom-effect border-primary mb-3'>";
									} else {
										echo "<div class='card zoom-effect border-success mb-3 text-white bg-success'>";
									}
								?>
								  	<div class="card-body">
								    	<p><?php echo $nome; ?></p>
								    	<p class="card-subtitle mb-2"><?php echo $categoria; ?></p>
								  	</div>
								</div>
							</a>
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
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
	              <h2 class="mb-0">Categorias</h2>
	            </div>
            	
            	<div class="card-body">
            		<div class="row icon-examples">

						<?php
							$sql = $con->prepare("SELECT nome, descricao, thumbnail FROM categorias ORDER BY nome;");
							$sql->execute();
							$resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

							// FOREACH BEGINS
							foreach ($resultados as $resultado) {
								$nome = $resultado['nome'];
								$descricao = $resultado['descricao'];
								$thumbnail = $resultado['thumbnail'];
						?>

						<div class="col-sm-12 col-md-6 col-lg-4">
							<a href="" style="text-decoration: none;">
								<div class="card zoom-effect border-primary">
									<img class="card-img-top" src="<?php echo $thumbnail; ?>" style="height: 100px; object-fit: cover">
									<div class="card-footer">
										<h5 class="card-title"><?php echo $nome; ?></h5>
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
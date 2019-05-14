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

	              <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapse-filter" style="float: right;">Show filters</button>

	            </div>
            		
            	<div class="card-body">
			    	

            		<div class="row icon-examples">
			    	
						<?php
							$con = getConnectionDB() or die ("Could not connect to database.");
							$sql = $con->prepare("SELECT id, name, category, category2, released, categories  FROM tools ORDER BY name;");
							$sql->execute();
							$resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
							// FOREACH BEGINS
							foreach ($resultados as $resultado) {
								$id = $resultado['id'];
								$name = $resultado['name'];
								$category = $resultado['category'];
								$category2 = $resultado['category2'];
								$released = $resultado['released'];
								$categories = $resultado['categories'];
						?>

						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 filter <?php echo $categories?>">
							
								<?php 
									if(is_null($released)) {
										echo "
											<div class='card zoom-effect border-primary mb-3'>
												<div class='card-body'>
											    	<p>$name</p>
											    	<p class='card-subtitle mb-2'>$category"; 
											    		if (!is_null($category2)) {
												    			echo ", $category2";
												    		}
											    	echo"</p>
											  	</div>
											</div>
										";
									} else  {
										echo "
											<a href='selected-tool.php?id=$id' style='text-decoration: none;'>
												<div class='card zoom-effect border-success mb-3 text-white bg-success'>
													<div class='card-body'>
												    	<p>$name</p>
												    	<p class='card-subtitle mb-2'>$category"; 
												    		if (!is_null($category2)) {
												    			echo ", $category2";
												    		}
												    	echo "</p>
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

	<script type="text/javascript">
		$(document).ready(function(){

		    $(".filter-button").click(function(){
		        var value = $(this).attr('data-filter');
		        
		        if(value == "all")
		        {
		            //$('.filter').removeClass('hidden');
		            $('.filter').show('1000');
		        }
		        else
		        {
		//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
		//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
		            $(".filter").not('.'+value).hide('3000');
		            $('.filter').filter('.'+value).show('3000');
		            
		        }
		    });

		});
	</script>
</body>
</html>
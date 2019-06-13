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
	              <h2 class="mb-0">Tools List
					<button class="btn btn-dark btn-sm float-right" type="button" data-toggle="collapse" data-target="#collapse-filter" style="float: right;">+ Show filters</button>
	              </h2>

	              

	            </div>
            		
            	<div class="card-body">
		            <div class="collapse" id="collapse-filter">
					  <div class="card card-body">
					    <?php include("assets/includes/tools-categories.php"); ?>
					  </div>
					</div>

            		<div class="row icon-examples">
			    	
						<?php
							$con = getConnectionDB() or die ("Could not connect to database.");
							$sql = $con->prepare("SELECT id, name, category, category2, released, categories, avatar  FROM tools ORDER BY name;");
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
								$avatar = $resultado['avatar'];

								if(is_null($avatar)) {
									$avatar = 'assets/img/kali.png';
								}
						?>

						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 filter <?php echo $categories?>">
							
								<?php 
									if(is_null($released)) {
										echo "
											
												<div class='card zoom-effect bg-white mb-3 text-white'>
													<div class='card-body'>

									                  <div class='row'>
									                    <div class='col'>
									                      <span class='h2 font-weight-bold mb-0'>$name</span>
									                      <h5 class='card-title text-uppercase text-muted mb-0'>$category";

									                  	    if (!is_null($category2)) {
												    			echo ", $category2";
												    		}
												    		echo "</h5>
									                    </div>
									                    <div class='col-auto'>
									                      <div class='icon icon-shape text-white rounded-circle shadow'";

									                      echo " style='background-image: url($avatar); background-size: cover; background-position: center'> ";
									                      
									                      echo "
									                      </div>
									                    </div>
									                  </div>
									                  <p class='mt-3 mb-0 text-muted'>
									                    <span class='text-danger mr-2'>Unavailable</span>
									                    <span class='text-nowrap'></span>
									                  </p>
												  	</div>
												</div>
										";
									} else  {
										echo "
											<a href='selected-tool.php?id=$id' style='text-decoration: none;'>
												<div class='card zoom-effect mb-3 text-white bg-success'>
													<div class='card-body'>

									                  <div class='row'>
									                    <div class='col'>
									                      <span class='h2 font-weight-bold mb-0 text-white'>$name</span>
									                      <h5 class='card-title text-uppercase mb-0' style='color: #84edff;'>$category";

									                  	    if (!is_null($category2)) {
												    			echo ", $category2";
												    		}
												    		echo "</h5>
									                    </div>
									                    <div class='col-auto'>
									                      <div class='icon icon-shape text-white rounded-circle shadow'";

									                      echo " style='background-image: url($avatar); background-size: cover; background-position: center'> ";
									                      
									                      echo "
									                      </div>
									                    </div>
									                  </div>
									                  <p class='mt-3 mb-0 text-muted'>
									                    <span class='text-white mr-2'>Available</span>
									                    <span class='text-nowrap'></span>
									                  </p>
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
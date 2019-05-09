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
	              <h2 class="mb-0">Terminal</h2>
	            </div>
            	
            	<div class="card-body">
            		<center><span>The interaction with the terminal is done by <b>Shell In A Box</b>. You must have it installed on the host to use it.</span><br><br></center>
					<?php
						echo "<iframe class='iframe-terminal' src='https://192.168.0.10	:4200/'></iframe>";
					?>
					
				</div>
			</div>
	<?php
		include("assets/includes/footer.php")
	?>
</body>
</html>
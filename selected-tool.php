<!DOCTYPE html>
<html>
  <?php 
  	include("assets/includes/head.php"); 
    $tool = $_GET['id'];
  ?>
<body>
	<?php
		include("assets/includes/header.php");
	?>

  <?php
    $con = getConnectionDB() or die ("Could not connect to database.");
    $sql = $con->prepare("SELECT fullname, category, category2, description, site, github, avatar, cmd, target, resume  FROM tools WHERE id=$tool;");
    $sql->execute();
    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    // FOREACH BEGINS
    foreach ($resultados as $resultado) {
      $fullname = $resultado['fullname'];
      $category = $resultado['category'];
      $category2 = $resultado['category2'];
      $description = $resultado['description'];
      $site = $resultado['site'];
      $github = $resultado['github'];
      $avatar = $resultado['avatar'];
      $cmd = $resultado['cmd'];
      $target = $resultado['target'];
      $resume = $resultado['resume']
  ?>

	<!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
      	<div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                	<?php 
                		if ($avatar) {
                			echo "<img src='$avatar' class='rounded-circle'>";
                		} else {
                			echo "<img src='assets/img/kali.png' class='rounded-circle'>";
                		}
                	?>

                    
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <button data-container="body" data-toggle="popover" data-placement="right" class="btn btn-sm btn-info mr-4" data-content="<?php echo $resume; ?> ">About</button>
                <button class="btn btn-sm btn-default float-right" data-toggle="collapse" data-target="#commands" type="button"><i class="ni ni-bold-right"> </i> Commands</button>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>

                      <?php
                        if(is_null($description)) {
                          echo "
                            <span class='heading'><i class='ni ni-single-copy-04 text-default'></i></span>
                            <span class='description'>Description</span>
                          ";
                        } else {
                          echo "
                            <a target='_blank' href='$description'>
                              <span class='heading'><i class='ni ni-single-copy-04 text-default'></i></span>
                              <span class='description text-primary'>Description</span>
                            </a>
                          ";
                        }
                      ?>

                      </div>
                      <div>

                      <?php
                        if(is_null($site)) {
                          echo "
                            <span class='heading'><i class='ni ni-world-2 text-danger'></i></span>
                            <span class='description'>Site</span>
                          ";
                        } else {
                          echo "
                            <a target='_blank' href='$site'>
                              <span class='heading'><i class='ni ni-world-2 text-danger'></i></span>
                              <span class='description text-primary'>Site</span>
                            </a>
                          ";
                        }
                      ?>

                      </div>
                      <div>

                      <?php
                        if(is_null($github)) {
                          echo "
                            <span class='heading'><i class='ni ni-bold-right text-green'></i></span>
                            <span class='description'>Source Code</span>
                          ";
                        } else {
                          echo "
                            <a target='_blank' href='$github'>
                              <span class='heading'><i class='ni ni-bold-right text-green'></i></span>
                              <span class='description text-primary'>Source Code</span>
                            </a>
                          ";
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?php echo $fullname; ?>
                </h3>
                
                <div>
                  <i class="ni education_hat mr-2"></i>
                  <?php 
                  	echo $category;
					if (!is_null($category2)) {
						echo ", $category2";
					}
                  ?> 
												    		                  
                </div>
                <hr class="my-4" />
                <form>
                <div class="col-sm-12 offset-md-3 col-md-6">

                		<p>Enter the target's address: </p>

                	 	<div class="form-group">
				        	<input id='target' type="text" placeholder="Example: 127.0.0.1" class="form-control is-valid" onchange="getTarget();" />
				      	</div>
                </div>
                
                <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#options"> + Options</button>
                <button class="btn btn-default" type="button" onclick="execute();"><i class="ni ni-bold-right"></i> Execute</button>
                <br><br>

                <div class="collapse options" id="options">
        				  <h6 class="heading-small text-muted mb-4">Inputs</h6>

                  <!-- INPUTS LIST COMMANDS -->
      				  	<div class="col-xl-12">
                    <div class="row">
                        <?php
                          $sql2 = $con->prepare("SELECT name, example, command FROM commands WHERE tool=$tool AND type='input' ORDER BY name");
                          $sql2->execute();
                          $resultados2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

                          // FOREACH BEGINS
                          foreach ($resultados2 as $resultado2) {
                            $name = $resultado2['name'];
                            $example = $resultado2['example'];
                            $command = $resultado2['command'];

                            echo "
                              <div class='col-md-12 col-lg-6 col-xl-4'>
                                <div class='form-group'>
                                  <label class='form-control-label' for='input-username'>$name</label>
                                  <input type='text' id='input-data' name='$command' class='form-control form-control-alternative' placeholder='$example'>
                                </div>
                              </div>
                            ";
                          }
                        ?>

                         
                         <!-- CHECKBOX LIST COMMANDS -->
                         <div class="col-xl-12">
                          <h6 class="heading-small text-muted mb-4">Scripts</h6>
                         </div>

                        <?php
                          $sql2 = $con->prepare("SELECT id, name, command FROM commands WHERE tool=$tool AND type='checkbox' ORDER BY name");
                          $sql2->execute();
                          $resultados2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

                          // FOREACH BEGINS
                          foreach ($resultados2 as $resultado2) {
                            $id = $resultado2['id'];
                            $name = $resultado2['name'];
                            $command = $resultado2['command'];

                            echo "
                            <div class='col-lg-12 col-xl-6'>
                                <div class='row'>
                                  <label class='custom-toggle'>
                                      <input id='checkbox-data' name='$command' type='checkbox'>
                                      <span class='custom-toggle-slider rounded-circle'></span>
                                  </label>
                                  <span>&nbsp $name</span>
                                  <span class='clearfix'></span>
                                </div>
                            </div>
                            ";
                          }
                        ?>
                          <br><br><br>
                      </div>
                  	</div>
                </div>
      </form>

      <?php include ("assets/includes/list-commands.php"); ?>
                
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col">  
        <div class="collapse terminal" id="terminal" >
          <div class="card card-body text-white bg-dark">
            <h2 class="card-title text-white">Terminal</h2>
            <p class="card-text" id="terminal-data"></p>
          </div>
        </div>
      </div>
    </div>

	<?php
  // FOREACH ENDS
    }

		include("assets/includes/footer.php")
	?>

  <script type="text/javascript">
    var command = '<?php echo $cmd; ?>';

    function execute() {
        $(".btn-default").click(function()  {
          $(".options").collapse('hide');
          $(".terminal").collapse('show');
        });

        document.getElementById("terminal-data").innerHTML = "Loading...";

        /* GET target */
        var target = document.getElementById('target').value;

        if (target) {
	        /* Verify if have target command */
	        if ('<?php echo $target; ?>') {
	        	target = '<?php echo $target; ?>' + " " + target;
	        }        	
        }


        /* Inputs verification */
        var arrayInputs = [];
        var inputs = document.querySelectorAll("input[id=input-data]");
        for (var index = 0; index < inputs.length; ++index) {
            if (inputs[index].value) {
              arrayInputs.push([inputs[index].name, inputs[index].value]);
            }
        }
        
        /* Checkbox verification */
        var arrayCheckbox = [];
        var checkbox = document.querySelectorAll("input[id=checkbox-data]");
        for (var index = 0; index < checkbox.length; ++index) {
            if (checkbox[index].checked) {
              	arrayCheckbox.push(checkbox[index].name);           
            }
        }

        $.post("run.php", {
          "command" : command, 
          "target" : target, 
          "arrayCheckbox" : arrayCheckbox, 
          "arrayInputs" : arrayInputs
        }).done(function (data) {
          document.getElementById("terminal-data").innerHTML = data; //Pega a resposta da pagina_que_ira_receber_o_post.php
        }).fail(function (error) {
            document.getElementById("terminal-data").innerHTML = error;
        });
    }

  </script>

</body>
</html>
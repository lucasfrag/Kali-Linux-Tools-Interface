<!DOCTYPE html>
<html>
  <?php 
  	include("assets/includes/head.php"); 
  ?>
<body>
	<?php
		include("assets/includes/header.php");
    $online = false;
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
                    <img src="assets/img/nmap.jpg" class="rounded-circle">
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <a target="_blank" href="https://tools.kali.org/information-gathering/nmap">
                        <span class="heading"><i class="ni ni-single-copy-04 text-default"></i></span>
                        <span class="description text-primary">Description</span>
                      </a>
                    </div>
                    <div>
                      <a target="_blank" href="https://insecure.org/">
                        <span class="heading"><i class="ni ni-world-2 text-danger"></i></span>
                        <span class="description text-primary">Site</span>
                      </a>
                    </div>
                    <div>
                      
                        <span class="heading"><i class="ni ni-bold-right text-green"></i></span>
                        <span class="description">GitHub</span>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  Nmap: the Network Mapper
                </h3>
                
                <div>
                  <i class="ni education_hat mr-2"></i>Information Gathering, Vulnerability Analysis
                </div>
                <hr class="my-4" />
                <form>
                <div class="col-sm-12 offset-md-3 col-md-6">
                		<p>Digite o endereço do alvo: </p>

                	 	<div class="form-group has-success">
				        	<input type="text" placeholder="Example: 127.0.0.1" class="form-control is-valid" />
				      	</div>
                </div>
                
                <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#options"> + Options</button>
                <button class="btn btn-default" type="button" onclick="execute();"><i class="ni ni-bold-right"></i> Execute</button>
                <br><br>

                <div class="collapse options" id="options">
        				  <div class="card card-body">
        				  	<h6 class="heading-small text-muted mb-4">User information</h6>
        				  	<div class="pl-lg-4">
        					   <div class="row">
		                    <div class="col-lg-3">
		                      <div class="form-group">
		                        <label class="form-control-label" for="input-username">Username</label>
		                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="lucky.jesse">
		                      </div>
		                    </div>
		                    <div class="col-lg-3">
		                      <div class="form-group">
		                        <label class="form-control-label" for="input-email">Email address</label>
		                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com">
		                      </div>
		                    </div>
	                	</div>
                	</div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="collapse terminal" id="terminal">
    <div class="container-fluid">
        <div class="row">
          <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
            <div class="card text-white bg-dark">
              <div class="card-body">
                    <h2 class="card-title text-white">Terminal</h2>
                    <p class="card-text" id="terminal-data"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <script type="text/javascript">
    function execute() {
        $(".btn-default").click(function()  {
          $(".options").collapse('hide');
          $(".terminal").collapse('show');
        });

        document.getElementById("terminal-data").innerHTML = "Loading...";

        $.post("run.php", {
          "command": "ping 8.8.8.8"
        }).done(function (data) {
          document.getElementById("terminal-data").innerHTML = data; //Pega a resposta da pagina_que_ira_receber_o_post.php
        }).fail(function (error) {
            document.getElementById("terminal-data").innerHTML = error;
        });
    }
  </script>

	<?php
		include("assets/includes/footer.php")
	?>
</body>
</html>
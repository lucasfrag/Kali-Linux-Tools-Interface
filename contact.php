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
	              <h2 class="mb-0">Contact</h2>
	            </div>
            	
            	<div class="card-body">
            		<ul class="timeline">
							<li class="timeline-item">
								<div class="timeline-badge" style="background-color: #1ABB9C;"><i class="glyphicon glyphicon-comment"></i></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
											

									</div>
									<div class="timeline-body">
										<p>
											<br>
											Te dou boas-vindas ao Goulmi! 
											
											<br><br>
											Eu sou o Jeferson, responsável por esta etapa da sua solicitação. É exatamente assim que o seu cliente começará a receber todas as atualizações de status. De forma automática, fácil e super amigável!<br><br> Caso você tenha gostado ou queira interagir um pouco mais comigo, clique no botão “Responder” aqui abaixo. Até logo!

											<div class="text-right">
												<br>
												<button class="btn btn-dark" onclick="startChat();" ><span class="icon-reply"></span> Reply</button>
											</div>
										</p>

									</div>
								</div>
							</li>
							<li id="item-1" class="timeline-inverted"></li>
							<li id="item-2" class="timeline-item"></li>
						</ul>
				</div>
			</div>

	<script type="text/javascript">
		function startChat() {
			document.getElementById("item-1").innerHTML = 
			""+
			"<div class='timeline-badge' style='background-color: #1ABB9C;'><i class='glyphicon glyphicon-comment'></i></div>"+
			"<div class='timeline-panel'>"+
			"	<div class='timeline-heading'>"+
			"		<h4 class='timeline-title'>Quem é você?</h4>"+
			"		<p><small class='text-muted'><i class='glyphicon glyphicon-time'></i> Agora</small></p>"+
			"	</div>"+
			"	<div class='timeline-body'>"+
			"		<p id='respostaDoUsuario'>"+
			"			  <form><textarea class='form-control' id='feedback' rows='3' placeholder='Write a large text here ...''></textarea></form>"+
			"			<div class=text-left>"+
			"				<br><button class='btn btn-primary' onclick='send()'><span class='icon-message'></span> Responder</button></form>"+
			"			</div>"+
			"		</p>"+
			"	</div>"+
			"</div>"+
			"";
		}

		function send() {
			var text = document.getElementById('feedback').value;
			document.getElementById("item-1").innerHTML = 

			""+
			"<div class='timeline-badge' style='background-color: #1ABB9C;'><i class='glyphicon glyphicon-comment'></i></div>"+
			"<div class='timeline-panel'>"+
			"	<div class='timeline-heading'>"+
			"		<h4 class='timeline-title'>Resposta</h4>"+
			"		<p><small class='text-muted'><i class='glyphicon glyphicon-time'></i> Agora</small></p>"+
			"	</div>"+
			"	<div class='timeline-body'>"+
			"		<p id='respostaDoUsuario'>"+
			text +
			"<br><br>" +
			"			<div class=text-left>"+
			"				<button class='btn btn-primary'><i class='ni ni-check-bold'></i> Enviado</button>"+
			"			</div>"+
			"		</p>"+
			"	</div>"+
			"</div>"+
			"";

			document.getElementById("item-2").innerHTML = 
			""+
			"<div class='timeline-badge' style='background-color: #1ABB9C;'><i class='ni ni-check-bold'></i></div>"+
			"<div class='timeline-panel'>"+
			"	<div class='timeline-heading'>"+
			"			<div class='col-xs-12 col-sm-5'>"+
			"				<img src='images/gabriel.jpg' width='100%' style='border-radius: 1500px;'>"+
			"			</div>"+
			"			<div class='col-xs-12 col-sm-7'>"+
			"				<h4 class='timeline-title'>Viu como é fácil?</h4>"+
			"				<p><small class='text-muted'><i class='glyphicon glyphicon-time'></i> Agora</small></p>"+
			"			</div>"+
			""+
			"	</div>"+
			"	<div class='timeline-body'>"+
			"<p>"+
			"	<br>"+
			"	Olá, "+ text + "!"+
			"	"+
			"	<br><br>"+
			""+
			"	<div class='text-right'>"+
			"		<br>"+
			"		<button class='btn btn-primary' onclick='responder2()'><span class='icon-reply'></span> Responder</button>"+
			"	</div>"+
			"</p>"+
			""+
			"	</div>"+
			"</div>"+
			"";
		}
	</script>

	<?php
		include("assets/includes/footer.php")
	?>

</body>
</html>
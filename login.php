<!DOCTYPE html>
<html>
<head>
  <?php 
  	include("assets/includes/head.php"); 
  ?>
</head>
<body>

<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Connecting via SSH to your host</h5>
            <p class="text-center">
            	<img src="assets/img/logo.png" width="100px">
            </p>
            

            <form class="form-signin" method="post" action="login-validation.php">
              <div class="form-label-group">
                <input type="text" name="host" class="form-control" required autofocus>
                <label for="host">Hostname / IP address</label>
              </div>

			  <div class="form-label-group">
                <input type="text" name="user" class="form-control" required>
                <label for="user">User</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" class="form-control" required>
                <label for="password">Password</label>
              </div>


              <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit"><i class="ni ni-bold-right"></i> Connect</button>
              <hr class="my-4">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</body>
</html>


<style type="text/css">
:root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

body {
  background-image: url('assets/img/background.jpg');
  background-size: cover;
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

</style>
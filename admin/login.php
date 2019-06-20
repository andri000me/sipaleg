<?php
  session_start();
  require '../functions.php';

  $loginAdmin = sessionCheckerAdmin();

  if ($loginAdmin == 1){
    header("location: index");
    exit;
  }

  if (isset($_POST['loginAdmin'])) {
    if (loginAdmin($_POST)){
      $username = htmlspecialchars($_POST['uname']);
      $password = htmlspecialchars($_POST['pass']);

      $_SESSION['usernameAdmin'] = $username;
      $_SESSION['statusAdmin'] = "aktif";

      // var_dump($_SESSION);

      echo "
        <script>
          alert('Berhasil Login.');
          location.href = 'index';
        </script>
      ";
    }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SIPALEG Admin | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<style type="text/css">
	.container-login100::before{
		background: -webkit-linear-gradient(bottom, #ff1100, #fff);
	}
	</style>
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('../assets/img/pemilu/pemilu2.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" method="post">
					<div class="login100-form-avatar">
						<img src="../assets/img/avatars/avatar-01.jpg" alt="AVATAR">

					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						ADMIN SIPALEG
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<span class="text-white" id="username_info"><?= $uname_info?></span>
						<input class="input100" type="text" name="uname" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
			      <span class="text-white" id="username_info"><?= $pw_info?></span>
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit" name="loginAdmin">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">
						</a>
					</div>

          <div class="text-center w-full">
						<a class="txt1" href="../">
							Back to Website
							<i class="fa fa-long-arrow-right"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

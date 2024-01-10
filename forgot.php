<?php
session_start();
$error = array();

	if(!$con = mysqli_connect("localhost","root","","casacristina")){

		die("could not connect");
	}

	$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}

	//something is posted
	if(count($_POST) > 0){

		switch ($mode) {
			case 'enter_email':
				// code...
				$email = $_POST['email'];
				//validate email
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$error[] = "Please enter a valid email";
				}elseif(!valid_email($email)){
					$error[] = "That email was not found";
				}else{

					$_SESSION['forgot']['email'] = $email;
					send_email($email);
					header("Location: forgot.php?mode=enter_code");
					die;
				}
				break;

			case 'enter_code':
				// code...
				$code = $_POST['code'];
				$result = is_code_correct($code);

				if($result == "Codul este corect"){

					$_SESSION['forgot']['code'] = $code;
					header("Location: forgot.php?mode=enter_password");
					die;
				}else{
					$error[] = $result;
				}
				break;

			case 'enter_password':
				$password = $_POST['password'];
				$password2 = $_POST['password2'];

				if($password !== $password2){
					$error[] = "Parolele nu seamănă";
				}elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
					header("Location: forgot.php");
					die;
				}else{

					save_password($password);
					if(isset($_SESSION['forgot'])){
						unset($_SESSION['forgot']);
					}

					header("Location: login.php");
					die;
				}
				break;

			default:
				// code...
				break;
		}
	}

	function send_email($email){

		global $con;

		$expire = time() + (60 * 1);
		$code = rand(10000,99999);
		$email = addslashes($email);

		$query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
		mysqli_query($con,$query);

	}

	function save_password($password){

		global $con;

		$password = sha1(md5($password));
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "update users set password = '$password' where email = '$email' limit 1";
		mysqli_query($con,$query);

	}

	function valid_email($email){
		global $con;

		$email = addslashes($email);

		$query = "select * from users where email = '$email' limit 1";
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				return true;
 			}
		}

		return false;

	}

	function is_code_correct($code){
		global $con;

		$code = addslashes($code);
		$expire = time();
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				if($row['expire'] > $expire){

					return "Codul este corect";
				}else{
					return "Codul a expirat";
				}
			}else{
				return "Codul este incorect";
			}
		}

		return "Codu este incorect";
	}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>
  </head>
  <body>

     <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">

              </div>
              <?php

			switch ($mode) {
				case 'enter_email':
					// code...
					?>
						<form method="post" action="forgot.php?mode=enter_email">
							<h3>Ai uitat parola?</h3>
							<h6 class="font-weight-light">Introduceți adresa de email</h6>
							<span style="font-size: 12px;color:red;">
							<?php
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>
							<input class="form-control" type="email" name="email" placeholder="Email"><br>
							<br style="clear: both;">
							<input  type="submit" value="Următor">
							<br><br>
							<div><a href="login.php">Conecteaza-te</a></div>
						</form>
					<?php
					break;

				case 'enter_code':
					// code...
					?>
						<form method="post" action="forgot.php?mode=enter_code">
							<center><h3>Ai uitat parola?</h3>
							<h6 class="font-weight-light">Introduceți codul de recuperare a parolei</h6></center>
							<span style="font-size: 12px;color:red;">
							<?php
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>

							<input class="form-control" type="text" name="code" placeholder="Enter Code"><br>
							<br style="clear: both;">
							<input type="submit" value="Next" style="float: right;">
							<a href="forgot.php">
								<input type="button" value="Start Over">
							</a>
							<br><br>
							<div><a href="login.php">Conectează-te</a></div>
						</form>
					<?php
					break;

				case 'enter_password':
					// code...
					?>
						<form method="post" action="forgot.php?mode=enter_password">
							<center><h3>Ai uitat parola?</h3>
							<h6 class="form-control">Introduceți noua parolă</h6></center>
							<span style="font-size: 12px;color:red;">
							<?php
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>

							<input class="form-control" type="text" name="password" placeholder="Parola nouă"><br>
							<input class="form-control" type="text" name="password2" placeholder="Reintroduceți parola nouă"><br>
							<br style="clear: both;">
							<input type="submit" value="Următor" style="float: right;">
							<a href="forgot.php">
								<input type="button" value="De la început">
							</a>
							<br><br>
							<div><a href="login.php">Conectează-te</a></div>
						</form>
					<?php
					break;

				default:
					// code...
					break;
			}

		?>
              <div class="row animate__animated animate__pulse">
                <div class="col-md-12 offset-md-0">

                </div>
              </div>
        </div>

<?php include("includes/footer.php"); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript">
    $('.toast').toast('show')

    </script>
  </body>
</html>
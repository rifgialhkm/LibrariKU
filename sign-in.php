<?php 
require_once 'function.php';
session_start();
if (isset($_SESSION['user_login'])) {
    header('location: index.php');
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE email = '".$email."' AND password = '".$password."'";

		$result = mysqli_query($conn, $sql);

		$row = mysqli_fetch_array($result);
		$_SESSION["user_login"] = $email;
		header("location: index.php");

}

 ?>

<DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LibrariKU | Sign in</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/stylesheet/stylesheet.css">
</head>
<body>
	<div class="loginPage">
		<div class="containers">
			<div class="forms-container">
				<div class="signin">
					<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" class="sign-in-form" autocomplete="off">
						<div class="img">
							<img src="image/avatar.svg">
						</div>
						<h2 class="title">Sign in</h2>
						<div class="input-field">
							<i class="fas fa-user"></i>
							<input type="email" name="email" id="email" placeholder="Email" value="<?= isset($email) ? $email:''; ?>">
						</div>
						<div class="input-field">
							<i class="fas fa-lock"></i>
							<input type="password" name="password" id="password" placeholder="Password">
						</div>
						<input type="submit" name="login" class="btn solid" value="login">
						<a href="sign-up.php">Don't have an account? Sign up</a>
					</form>
				</div>
			</div>
			<div class="panels-container">
				<div class="panel left-panel">
					<div class="content">
						<h3>Welcome back</h3>
						<p>I am happy to see you again. You can continue where you left off by logging in.</p>
					</div>
					<img src="image/signin.svg" class="image-in"></img>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
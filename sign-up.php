<?php
	require 'function.php';

	if (isset($_POST['user_register'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$password_hash = password_hash($password, PASSWORD_DEFAULT);
 
		$result = mysqli_query($conn, "INSERT INTO `user`(`name`, `email`,`password`, `status`) VALUES ('$name','$email','$password_hash', '0')");

		if($result){
			echo '<script type="application/javascript">alert("Succesfully Registered!");</script>';
		}else{
    		echo "Error!";
    	}
	}
?>

<DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LibrariKU | Sign up</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/stylesheet/stylesheet.css">
</head>
<body>
	<div class="loginPage">
		<div class="containers">
			<div class="forms-container">
				<div class="signin">
					<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>" class="sign-in-form" autocomplete="off">
						<div class="img">
							<img src="image/avatar.svg">
						</div>
						<h2 class="title">Sign up</h2>
						<div class="input-field">
							<i class="fas fa-user"></i>
							<input type="text" name="name" placeholder="Name" required>
						</div>
						<div class="input-field">
							<i class="fas fa-user"></i>
							<input type="email" name="email" placeholder="Email" required>
						</div>
						<div class="input-field">
							<i class="fas fa-lock"></i>
							<input type="password" name="password" placeholder="Password" required>
						</div>
						<input type="submit" name="user_register" class="btn solid" value="register">
						<a href="sign-in.php">Have an account? Sign in</a>
					</form>
				</div>
			</div>
			<div class="panels-container">
				<div class="panel left-panel">
					<div class="content">
						<h3>Hello, welcome to LibrariKU</h3>
						<p>Create an account and join with us?</p>
					</div>
					<img src="image/signup.svg" class="image-up"></img>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
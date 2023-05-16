<?php 

	$page = explode('/', $_SERVER['PHP_SELF']);
	$page = end($page);
	require_once 'function.php';

	session_start();

	if (!isset($_SESSION['user_login'])) {
	    header('location: sign-in.php');
	}
	$user_login = $_SESSION['user_login'];
	$data = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$user_login'");

	$user_info = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/stylesheet/stylesheet.css">
</head>
<body>
	<!-- ===== Header ===== --> 
	<header class="header">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="logo">
					<a href="index.php" class="logo">Librari<span>KU</span></a>
				</div>
				<form action="search.php" method="post" autocomplete="off">
					<div class="search">
						<input type="text" name="search" id="search" placeholder="Find your favorite books" required>
						<button type="submit" name="submit" class="btn-search"><i class="fa fa-search"></i></button>
					</div>
				</form>
				<input type="checkbox" id="nav-check">
				<label for="nav-check" class="nav-toggler">
					<span></span>
				</label>
				<nav class="nav">
					<ul id="nav">
						<li id="navhome"><a href="index.php" class="menu active">Home</a></li>
						<li id="navabout"><a href="about.php" class="menu">About</a></li>
						<li id="navcontact"><a href="contact.php" class="menu">Contact</a></li>
						<li><p>Hi, <?php echo $user_info['name']; ?></p></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- <script src="assets/javascript/script.js"></script> -->
</body>
</html>
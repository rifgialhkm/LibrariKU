<!DOCTYPE html>
<html>
<head>
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
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="contact.php" class="active">Contact</a></li>
						<li><a href="#account">Account</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>

	<!-- ===== Contact Section ===== -->
	<section class="contact-section section" id="contact">
		<div class="container">
			<div class="row">
				<div class="section-title">
					<h2>Contact Us</h2>
				</div>
			</div>
			<div class="row contact-info">
				<div class="contact-info-card">
					<div class="icon"><i class="fa fa-phone"></i></div>
					<div class="text">
						<h4>Phone</h4>
						<p>+62 8123 4567 8910</p>
					</div>
				</div>
				<div class="contact-info-card">
					<div class="icon"><i class="fa fa-envelope"></i></div>
					<div class="text">
						<h4>Email</h4>
						<p>librariku@gmail.com</p>
					</div>
				</div>
				<div class="contact-form">
					<div class="contact-form-col">
						<input type="text" name="form-control" placeholder="*Name">
					</div>
					<div class="contact-form-col">
						<input type="text" name="form-control" placeholder="*Email">
					</div>
					<div class="contact-form-col">
						<input type="text" name="form-control" placeholder="*Subject">
					</div>
					<div class="contact-form-col">
						<textarea name="form-control" placeholder="Your Message..."></textarea>
					</div>
					<div class="contact-form-col">
						<button type="submit" class="btn-1 btn">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
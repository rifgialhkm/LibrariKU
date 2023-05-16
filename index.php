<?php 

	require_once 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/stylesheet/stylesheet.css">
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
	<title>LibrariKU | Home</title>
</head>
<body>

	<!-- ===== Home Section ===== -->
	<section class="home-section section active" id="home">
		<div class="container">
			<div class="row h-100 align-items-center align-content-center">
				<div class="home-text">
					<h1><span>Find</span> and <span>Read</span><br>
						Your Favorite<br>
						<span>Books</span>
					</h1>
					<a href="#books" class="btn btn-1">Lets read!</a>
				</div>
				<div class="home-img">
					<div class="home-img-inner">
						<img src="image/home-img.png" class="main-bg" alt="home-img">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ===== Book Items Section ===== -->
	<section class="books-section section sec-padding" id="books">
		<div class="container">
			<div class="row">
				<div class="section-title">
					<h2>Latest Updates</h2>
				</div>
			</div>
			<div class="row">
				<?php 
					$books = query("SELECT * FROM `books` ORDER BY `time` DESC LIMIT 5");
			        foreach($books as $row) :
						?>
							<div class="book-item">
								<div>
									<div class="book-img">
										<img src="lms/books/cover/<?= $row['book_cover']; ?>" alt="book-cover">
										<a href="book-details.php?id=<?= base64_encode($row['id']); ?>" class="btn btn-2">See Details</a>
									</div>
									<div class="book-info">
										<h3><?= $row['book_title']; ?></h3>
										<p><?= $row['book_author']; ?></p>
									</div>
								</div>
							</div>
						<?php 
					endforeach;
				?>
			</div>
			<div class="row">
				<div class="section-title">
					<h2>Recommendation</h2>
				</div>
			</div>
			<div class="row">
				<?php 
					$books = query("SELECT * FROM `books` ORDER BY RAND() LIMIT 5");
			        foreach($books as $row) :
						?>
							<div class="book-item">
								<div>
									<div class="book-img">
										<img src="lms/books/cover/<?= $row['book_cover']; ?>" alt="book-cover">
										<a href="book-details.php?id=<?= base64_encode($row['id']); ?>" class="btn btn-2">See Details</a>
									</div>
									<div class="book-info">
										<h3><?= $row['book_title']; ?></h3>
										<p><?= $row['book_author']; ?></p>
									</div>
								</div>
							</div>
						<?php 
					endforeach;
				?>
			</div>
			<div class="row">
				<div class="section-title">
					<h2>All Books</h2>
				</div>
			</div>
			<div class="row">
				<?php 
					$books = query("SELECT * FROM `books` ORDER BY `book_title` ASC");
			        foreach($books as $row) :
						?>
							<div class="book-item">
								<div>
									<div class="book-img">
										<img src="lms/books/cover/<?= $row['book_cover']; ?>" alt="book-cover">
										<a href="book-details.php?id=<?= base64_encode($row['id']); ?>" class="btn btn-2">See Details</a>
									</div>
									<div class="book-info">
										<h3><?= $row['book_title']; ?></h3>
										<p><?= $row['book_author']; ?></p>
									</div>
								</div>
							</div>
						<?php 
					endforeach;
				?>
			</div>
		</div>
	</section>

	<footer>
		<div class="footer-container">
			<div class="footer-left">
				<h2>Librari<span>KU</span></h2>
			</div>
			<div class="footer-right">
				<h4>Follow us on</h4>
				<div class="social-icons">
					<a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
					<a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
					<a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
				</div>
			</div>
		</div>
		<div class="copyright">
			<p>&copy; 2021 LibrariKU. All Rights Reserved.</p>
		</div>
	</footer>
</body>
</html>
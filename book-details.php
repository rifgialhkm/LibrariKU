<?php 
	require 'header.php';

	$id = base64_decode($_GET['id']);

	$books = query("SELECT * FROM `books` WHERE `id` = '$id'");
	foreach($books as $row) :
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $row['book_title']; ?></title>
</head>
<body>
	<section class="details-section">
		<div class="container">
			<div class="row align-items-center text-align-center">
				<div class="details-wrapper">
					<div class="details-img">
						<img src="image/details-img.png" alt="details-img">
					</div>
					<div class="book-img">
						<img src="lms/books/cover/<?= $row['book_cover']; ?>">
						<a href="book-read.php?id=<?= base64_encode($row['id']); ?>" class="btn btn-2" target="blank">Read</a>
					</div>
					<div class="book-title">
						<h2><?= $row['book_title']; ?></h2>
						<p><?= $row['book_author']; ?></p>
					</div>
					<div class="book-details">
						<div class="details-title">
							<h4>Details</h4>
						</div>
						<div class="details-content">
							<dt>
								<p class="detailLeft">Page of Number</p>
								<p class="detailRight"><?= $row['book_page']; ?></p>
							</dt>
							<dt>
								<p class="detailLeft">Year Publish</p>
								<p class="detailRight"><?= $row['book_year']; ?></p>
							</dt>
							<dt>
								<p class="detailLeft">ISBN</p>
								<p class="detailRight"><?= $row['book_isbn']; ?></p>
							</dt>
							<dt>
								<p class="detailLeft">Publisher</p>
								<p class="detailRight"><?= $row['book_publisher']; ?></p>
							</dt>
						</div>
					</div>
					<div class="book-desc">
						<div class="desc-title">
							<h4>Description</h4>
						</div>
						<div class="desc-text">
							<p><?= $row['book_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="books-section" id="books">
		<div class="container">
			<div class="row">
				<div class="section-title">
					<h2>Recommendation</h2>
				</div>
			</div>
			<div class="row">
				<?php 
					$books = query("SELECT * FROM `books` ORDER BY RAND() LIMIT 10");
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
</body>
</html>
<?php 
	endforeach;
?>
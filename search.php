<?php 

	require 'header.php';
?>
	<section class="books-section sec-padding" id="books">
		<div class="container">
			<div class="row">
				<div class="section-title">
					<h2>Search Result</h2>
				</div>
			</div>
			<div class="row">
				<?php 
					$books = query("SELECT * FROM `books`");

					if (isset($_POST["submit"])) {
						$books = find($_POST["search"]);
					}
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
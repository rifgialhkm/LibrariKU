<?php 


$conn = mysqli_connect("localhost", "root", "", "librariku");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function find($search) {
	$query = "SELECT * FROM books WHERE
			book_title LIKE '%$search%' OR
			book_author LIKE '%$search%'
		";
	return query($query);
}


?>
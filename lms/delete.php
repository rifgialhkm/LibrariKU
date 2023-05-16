<?php 
	require_once 'connect.php';

	if (isset($_GET['bookdelete'])) {
		$id = base64_decode($_GET['bookdelete']);
		mysqli_query($sql, "DELETE FROM `books` WHERE `id` = '$id'");
		header('location: manage-books.php');
	}
?>
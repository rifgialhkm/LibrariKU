<?php 

require_once 'connect.php';

$id = base64_decode($_GET['id']);


mysqli_query($sql, "UPDATE `user` SET `status` = '1' WHERE `id` = '$id'");
header('location: user.php');

?>
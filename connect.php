<?php 
	$conn = mysqli_connect("localhost", "root", "", "librariku");
	if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
?>
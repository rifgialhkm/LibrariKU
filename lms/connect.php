<?php 
	$sql = mysqli_connect("localhost", "root", "", "librariku");
	if(!$sql){
   die('Could not Connect My Sql:' .mysql_error());
}
mysqli_query($sql, 'SET CHARACTER SET utf8');
mysqli_query($sql, "SET SESSION collation_connection = 'utf8_general_ci'")
?>
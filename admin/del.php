<?php
 include('../connect-db.php');
 if (isset($_GET['id']) && is_numeric($_GET['id'])){
	 $id = $_GET['id'];
	 mysql_query("DELETE from result WHERE id=$id");
	 mysql_query("DELETE from temp WHERE id=$id")
	 or die(mysql_error()); 
	 header("Location: index.php?goto=editresult");
 } else {
	header("Location: index.php?goto=editresult");
 }
?>
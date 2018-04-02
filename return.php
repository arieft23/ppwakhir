<?php 
	include "header.php";
	include "configdb.php";

	if(isset($_GET['id'])){
			$id = $_GET['id'];
			$book_id = $_GET['book_id'];
			$user = $_SESSION['id'];
			$return = "UPDATE book SET quantity = quantity+1 WHERE book_id='".$book_id."'";
			$delete = "DELETE FROM loan WHERE loan_id = $id AND user_id = $user";

		if(!($result = mysql_query($return, $database))) {
				print("Could not execute the query"); 
				die(mysql_error());
		}
		if(!($result = mysql_query($delete, $database))) {
				print("Could not execute the query"); 
				die(mysql_error());
		}
		mysql_close($database);
		header("Location: loaned_page.php");
	}
 ?>
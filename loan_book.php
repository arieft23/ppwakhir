<?php 
	include "header.php";
	include "configdb.php";

	if(isset($_GET['qty'])){
		if($_GET['qty'] > 0){
			$id = $_GET['id'];
			$qty = $_GET['qty'];
			$loan = "UPDATE book SET quantity = quantity-1 WHERE book_id='".$id."'"; 
			$insert = 'INSERT INTO loan (book_id,user_id) VALUES ('.$id.','.$_SESSION['id'].')';
			if(!($result = mysql_query($loan, $database))) {
				print("Could not execute the query"); 
				die(mysql_error());
			}
			if(!($result = mysql_query($insert, $database))) {
				print("Could not execute the query"); 
				die(mysql_error());
			}
			mysql_close($database);
			header("Location: view_book.php");
		}else{

			header("Location: view_book.php?message=true");
		}

	}
	
 ?>
<?php       
		if(isset($_POST["submit"])){
			$title = $_POST["title"];
			$img_path = $_POST["img_path"];
			$author = $_POST["author"];
			$publisher = $_POST["publisher"];
			$desc = $_POST["desc"];
			$qty = $_POST["qty"];

			include "configdb.php";

			$query = "SELECT * FROM book WHERE title='".$title."'";
			if(!($result = mysql_query($query, $database))) {
				print("Could not execute the query"); 
				die(mysql_error());
			}
			$row = mysql_fetch_row($result);
			$count = mysql_num_rows($result);
			$book_id = $row[0];

			if($count == 0){
				$query = "INSERT INTO book (img_path, title, author, publisher, description, quantity) VALUES ('$img_path', '$title', '$author', '$publisher', '$desc', '$qty')";

				if(!($result = mysql_query($query, $database))) {
					print("Could not execute the query"); 
					die(mysql_error());
				}
			}else{
				$query = "UPDATE book SET quantity = quantity+".$qty." WHERE book_id='".$book_id."'";

				if(!($result = mysql_query($query, $database))) {
					print("Could not execute the query"); 
					die(mysql_error());
				}
			}
			

			$query = "SELECT book_id FROM book WHERE title='".$title."'";
			if(!($result = mysql_query($query, $database))) {
					print("Could not execute the query"); 
				die(mysql_error());
			}
			$row = mysql_fetch_row($result);
			$url = "book_page.php?id=$row[0]";
			mysql_close($database);
			header("location: $url");
		}
		

		?>

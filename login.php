<?php 
		//http://www.nyekrip.com/cara-membuat-form-login-dengan-php-mysql
		session_start();
		if(isset($_POST["submit"])){
			$name = mysql_real_escape_string($_POST["username"]);
			$pass = mysql_real_escape_string($_POST["pass"]);

			include "configdb.php";

			$query = "SELECT * FROM user WHERE username='".$name."' AND password='".$pass."'";

			if(!($result = mysql_query($query, $database))) {
				print("Could not execute the query"); 
				die(mysql_error());
			}
			$row = mysql_fetch_row($result);
			$count = mysql_num_rows($result);
     		// If result matched $myusername and $mypassword, table row must be 1 row
			if($count == 1) {
				$_SESSION['login_user'] = $name;
				$_SESSION['id'] = $row[0];
				$_SESSION['role'] = $row[3];
				
			header("location: view_book.php");
			}else {
				print "<h1>Your Login Name or Password is invalid<br>this page will redirecting you back to book list in 3 seconds...</h1>";
				header( "Refresh:3; url=view_book.php");
			}
			mysql_close($database);

		}
		else{
			header("location: view_book.php");
		}

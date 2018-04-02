<?php
	if(isset($_GET['logout'])){
		include "header.php";
		$user_name = $_SESSION["login_user"];
		print "<h1>".$user_name." has successfully logged out<br>this page will redirecting you back to book list in 3 seconds...</h1>";
		session_destroy();
		header( "Refresh:3; url=view_book.php");
	}
	else{
		header("location: view_book.php");
	}
<?php
	include "header.php";
	if(isset($_GET["delete"])){
		
		include "configdb.php";

		$query = "SELECT * FROM user";

        if(!($result = mysql_query($query, $database))) {
        	print("Could not execute the query"); 
            die(mysql_error());
        }          

        $user_id = $_GET['user_id'];
	    //DELETE a user instance
	    $delete_user = "DELETE FROM user WHERE user_id = $user_id ";

	    if(!($result = mysql_query($delete_user, $database))) {
	    	print("Could not execute the query"); 
	    	die(mysql_error());
	    }
	    mysql_close($database);
	    header("Location: index.php");
	}
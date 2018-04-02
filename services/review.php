<?php 
	$perintah=$_REQUEST["perintah"];
	session_start();

	if($perintah == "review" && isset($_SESSION['login_user'])){
		$konten = $_REQUEST["review"];
		$book_id = $_REQUEST["id"];
		$mydate=getdate(date("U"));
		$month = "$mydate[mon]";
		if($month < 10){
			$month = "0".$month;
		}
		$day = "$mydate[mday]";
		if($day < 10){
			$day = "0".$day;
		}
		$tanggal = "$mydate[year]-$month-$day";
		$servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "personal_library";
        $user_id = $_SESSION['id'];

        if(!($database = mysql_connect($servername, $dbusername, $dbpassword))) die("Could not connect to database");

        if(!mysql_select_db($dbname, $database));

        $query = "INSERT INTO review (book_id, user_id, date, content) VALUES ($book_id, $user_id, CURDATE(), '$konten')";
        if(!($result = mysql_query($query, $database))) {
			echo("Could not execute the query"); 
			die(mysql_error());
		}else{
			$query = "SELECT * FROM user WHERE user_id =".$user_id;
			if(!($result = mysql_query($query, $database))) {
				echo("Could not execute the query"); 
				die(mysql_error());
			}
			$row = mysql_fetch_assoc($result);
        	echo "<tr><td>".$row['username']."</td><td>".$tanggal."</td><td>$konten</td></tr>";
    	}
	}
 ?>
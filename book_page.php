<?php 
	include "header.php";
	include "configdb.php";

	error_reporting(E_ALL ^ E_DEPRECATED);
	
	$id = $_GET['id'];

	$query = "SELECT * FROM book WHERE book_id = $id ";

	if(!($result = mysql_query($query, $database))) {
      print("Could not execute the query"); 
      die(mysql_error());
    }
    echo '<div class="col-xs-12" style="height:50px;"></div>';
    echo "<div class='container-fluid'>";
	while($row = mysql_fetch_row($result)){
		echo "<div class='wrap row'>";

				echo "<div class='col-xs-12 col-md-3'>";
					echo "<img src=".$row[1]." alt=".$row[1]." height=400 width=300>";
				echo "</div>";
				echo "<div class='col-xs-12 col-md-8'>";
					echo '<div class="row">';
						echo "<div class='col-xs-12 col-md-12'>";
							echo "<table class='table'>";
							echo "<tr><th>Book ID</th>";
							echo "<td>: </td>";
							echo "<td><span id='book-id'>".$row[0]."</span></td></tr>";
							echo "<tr><th>Title</th>";
							echo "<td>: </td>";
							echo "<td>".$row[2]."</td></tr>";
							echo "<tr><th>Author</th>";
							echo "<td>: </td>";
							echo "<td>".$row[3]."</td></tr>";
							echo "<tr><th>Publisher</th>";
							echo "<td>: </td>";
							echo "<td>".$row[4]."</td></tr>";
							echo "<tr><th>Quantity</th>";
							echo "<td>: </td>";
							echo "<td>".$row[6]."</td></tr>";
							echo "</table>";
						echo "</div>";
						echo "<div class='col-xs-12 col-md-12'>";
						if(isset($_SESSION['login_user'])){
							echo '<div class="form-group">';
								echo '<label for="Review">Review:</label>';
								echo '<textarea class="form-control" rows="5" id="review" placeholder="Help others get to know this book"></textarea>';
								echo '<div class="col-xs-12" style="height:50px;"></div>';
								echo '<button type="button" id="submit-review" value="send" class="btn btn-default">Submit Review</button>';
							echo "</div>";
						}
						echo "</div>";	
					echo "</div>";
				echo "</div>";
		echo "</div>";
	echo "</div>";

	echo '<div class="col-xs-12" style="height:50px;"></div>';
	
	echo "<div class='container-fluid'>";
		echo "<h4>Description :</h4>".$row[5];
	echo "</div>";
	}

	echo '<div class="col-xs-12" style="height:50px;"></div>';
	echo '<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#review-container">Toogle Review Section</button>';

	echo "<div class='container-fluid' id='review-container'>";
		echo "<div><h4>Review about this book</h4>";
		$query = "SELECT * FROM review WHERE book_id = $id ";
			if(!($result = mysql_query($query, $database))) {
    			print("Could not execute the query"); 
      			die(mysql_error());
    		}
    		echo "<table class='table' id='table-review'>";
    		echo "<tr><th class='col-xs-2'>Nama Reviewer</th><th class='col-cs-2'>Tanggal Review</th><th class='col-xs-8'>Isi Review</th></tr>";

			while($row = mysql_fetch_row($result)){
				echo "<tr>";
				$query = "SELECT * FROM user WHERE user_id =".$row[2];
				if(!($result2 = mysql_query($query, $database))) {
	      			print("Could not execute the query"); 
	      			die(mysql_error());
    			}
    			while($row2 = mysql_fetch_row($result2)){
    				echo "<td>".$row2[1]."</td>";
    				echo "<td>".$row[3]."</td>";
    				echo "<td>".$row[4]."</td>";
    			}
    			echo "</tr>";
    	
			}
			echo "<table>";
		echo "</div>";
	echo "</div>";
	include "footer.php";
 ?>


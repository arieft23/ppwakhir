<?php
include "header.php";
if(isset($_GET['message'])){
	$message = "Buku Habis";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

	<div class="jumbotron">
		<h1>LibPung</h1>
		<p><i>"Mempermudah anda mencari buku!"</i></p>
	</div>
	<div class="container">
	  <div class="starter-template">
		<!-- Code here -->

		<?php
		include "configdb.php";

		$query = "SELECT * FROM book";

		if(!($result = mysql_query($query, $database))) {
		  print("Could not execute the query"); 
		  die(mysql_error());
		}          

		?>


		<h3>List Book</h3>

		<?php 
		  if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
			echo "<a class='btn btn-warning' href='add_book.php'>Tambah Buku</a>";
		  }
		 ?>

		<div class='row'>

		  <?php
		  while($row = mysql_fetch_row($result)){
			echo "<div class='col-md-5'>
					<div class='well'>
					<div class='row'>
						<div class='col-md-3'><img src=".$row[1]." alt=".$row[1]." height=200 width=100></div>
						<div class='col-md-1'></div>
						<div class='col-md-8 row'>";
							echo "<table class='table'>";
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
							echo "<a class='btn btn-info col-xs-5' href='book_page.php?id=".$row[0]."'>See this book</a><div class='col-xs-2'></div>";
							if(isset($_SESSION['login_user'])){  
								if($_SESSION['role'] == "user")
									echo "<a class='btn btn-warning col-xs-5' href='loan_book.php?id=".$row[0]."&qty=".$row[6]."'>Get this book</a></td>";	  
							}
						echo "</div>
					</div>
					</div>
				  </div><div class='col-md-1'></div>" ;
			  
		  }
		  ?>
		</div>
		</div>

	  </div><!-- /.container -->


	  <?php
	  include "footer.php";
	  mysql_close($database);
	  ?>
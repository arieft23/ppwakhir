<?php
	include "header.php";
	include "configdb.php";
	if(!isset($_SESSION['login_user'])){
    	header("location: view_book.php");
	}
?>

 <div class="container">
   
      <div class="starter-template">
        <h1><?=$_SESSION['login_user']."'s loan"?></h1>

        <?php
         include "configdb.php";

          $query = "SELECT * FROM loan WHERE user_id= '".$_SESSION['id']."'";

          if(!($result = mysql_query($query, $database))) {
            print("Could not execute the query"); 
            die(mysql_error());
          }          
        ?>

        <table class="table">
          <tr>
	        <th class='col-xs-2'>Cover</th>
	        <th class='col-xs-4'>Title</th>
	        <th class='col-xs-1'>Author</th>
	        <th class='col-xs-1'>Publisher</th>
	        <th class='col-xs-4'>Action</th>
	      </tr>
	      <?php
	      while($row1 = mysql_fetch_row($result)){
	      		$query2 = "SELECT * FROM book WHERE book_id = $row1[1] ";
	              //Passing variable ke halaman lainnya dapat menggunakan SESSION atau GET
	      		if(!($result1 = mysql_query($query2, $database))) {
            		print("Could not execute the query"); 
            		die(mysql_error());
          		}
          		while($row = mysql_fetch_row($result1)){
	        		echo "<tr><td><img src=".$row[1]." alt=".$row[1]." height=42 width=42></a></td><td>".$row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td>" ;
	        		echo "<td><a class='btn btn-primary col-md-5' href='return.php?id=".$row1[0]."&book_id=".$row[0]."'>Return this book</a><div class='col-md-2'></div><a class='btn btn-info col-md-5' href='book_page.php?id=".$row[0]."'>See this book</a></td>";
	          		echo "</tr>";
	      		}
	      }
	      ?>
        </table>

      </div>

    </div><!-- /.container -->

    <?php include "footer.php"?>
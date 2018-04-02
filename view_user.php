    <?php
      include "header.php";
      if(!isset($_SESSION['id'])){
          header("location: view_book.php");
      }
      $user_id = $_SESSION["id"];
      
    ?>

    <div class="container">
   
      <div class="starter-template">
        <h1>View User</h1>

        <?php
         include "configdb.php";

          $query = "SELECT * FROM review WHERE user_id = $user_id ";

          if(!($result = mysql_query($query, $database))) {
            print("Could not execute the query"); 
            die(mysql_error());
          }          
          print "<a class='btn btn-primary' href='loaned_page.php'>See loaned book</a>"
        ?>

        <table class="table">
          <tr>
            <th>Book ID</th>
            <th>Date</th>
            <th>Content</th>
          </tr>
          <?php
            for($counter = 0; $row = mysql_fetch_row($result); $counter++){
              //print_r($row);
              echo "<tr><td>" . $row[1] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td></tr>" ;
            }
          ?>
        </table>

      </div>

    </div><!-- /.container -->

    <?php include "footer.php"?>
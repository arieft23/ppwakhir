    
    <?php
      include "header.php";

      if(!isset($_SESSION['login_user'])){
        header( "refresh:0.5; url=view_book.php" ); 
        echo "<script>alert('hanya admin yg boleh masuk sini')</script>";
      }
      else if(($_SESSION['role']) == "user"){   
        header( "refresh:0.5; url=view_book.php" );
        echo "<script>alert('hanya admin yg boleh masuk sini')</script>"; 
      }
    ?>

    <div class="container">
   
      <div class="starter-template">
        <h1>Tugas Akhir</h1>
        <!-- Code here -->

        <?php
          include "configdb.php";

          $query = "SELECT * FROM user";

          if(!($result = mysql_query($query, $database))) {
            print("Could not execute the query"); 
            die(mysql_error());
          }          

        ?>


        <h3>List User</h3>
        <table class="table">
          <tr>
            <th width="10%">User ID</th>
            <th width="30%">Username</th>
            <th width="30%">Role</th>
            <th width="20%">Action</th>
          </tr>
          <?php
            while($row = mysql_fetch_row($result)){

              //Passing variable ke halaman lainnya dapat menggunakan SESSION atau GET
              echo "<tr><td>" . $row[0] . "</td><td><a href=view_user.php?user_id=".$row[0].">".$row[1]."</a></td><td>" . $row[3] . "</td><td> <a href=update_user.php?user_id=".$row[0].">Edit</a> | <a href=delete_user.php?delete=true&user_id=".$row[0].">Delete</a></td></tr>" ;
            }
          ?>
        </table>

        <a href="add_book.php?" class="btn btn-default">Tambah Buku</button>
        <a href="add_user.php" class="btn btn-default">Tambah User</a>

      </div>

    </div><!-- /.container -->


    <?php
      include "footer.php";
      mysql_close($database);
    ?>
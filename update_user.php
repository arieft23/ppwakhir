    
    <?php
    	include "header.php";
      include "configdb.php";
    ?>

    <div class="container">
   
      <div class="starter-template">
        <h1>Add a user</h1>
        <?php       
          if(isset($_GET["user_id"])){
            $user_id = $_GET["user_id"];
            $query = "SELECT * FROM user WHERE user_id = $user_id";

            //print("$query");

            if(!($result = mysql_query($query, $database))) {
              print("Could not execute the query"); 
              die(mysql_error());
            }

            if($row = mysql_fetch_assoc($result)) {
              $user_id = $row["user_id"];
              $username_user = $row["username"];
              $password_user = $row["password"];
            }
          }
          
          if(isset($_POST["submit"])){

            $user_id = $_POST["userid"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $role = $_POST["role"];


            $queryupdate = "UPDATE user SET username = '$username',password = '$password',role = '$role' WHERE user_id = $user_id";

            

            if(!($result = mysql_query($queryupdate, $database))) {
              print("Could not execute the query"); 
              die(mysql_error());
            }

            header("Location: index.php");
          }
          

          mysql_close($database);

        ?>

        <div class="col-md-6 col-xs-12">
        	<form method="POST" action="update_user.php?update=true">
            <div class="form-group" >
              <label for="user_id">User ID</label>
              <input type="text" class="form-control" id="user_id" name="userid" value="<?php echo "$user_id"?>">
            </div>
    			  <div class="form-group" >
    			    <label for="username">Username</label>
    			    <input type="text" class="form-control" id="username" name="username" value="<?php echo "$username_user" ?>">
    			  </div>
    			  <div class="form-group">
    			    <label for="password">Password</label>
    			    <input type="password" class="form-control" id="password" value="<?php echo "$password_user" ?>" name="password">
    			  </div>
    			  <div class="form-group">
    			    <label for="role">Role</label>
    			    <select class="form-control" id="role" name="role">
    				  <option value="admin">Admin</option>
    				  <option value="user">User</option>
    				</select>
    			  </div>
    			  <button type="submit" class="btn btn-default" name="submit">Submit</button>
    			</form>
        </div>

      </div>

    </div><!-- /.container -->

    <?php
    
    include "footer.php";
    
    ?>
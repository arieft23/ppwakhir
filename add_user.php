    
<?php
include "header.php";
?>

<div class="container">
 
  <div class="starter-template">
    <h1>Add a user</h1>

    <div class="col-md-6 col-xs-12">
      <form method="POST" action="add_user.php">
       <div class="form-group" >
         <label for="username">Username</label>
         <input type="text" class="form-control" id="username" placeholder="Your username" name="username">
       </div>
       <div class="form-group">
         <label for="password">Password</label>
         <input type="password" class="form-control" id="password" placeholder="Password" name="password">
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

  <?php       

  if(isset($_POST["submit"])){
   $username = $_POST["username"];
   $password = $_POST["password"];
   $role = $_POST["role"];

   include "configdb.php";

   $query = "INSERT INTO user (username, password, role) VALUES ('$username',  '$password', '$role')";

   if(!($result = mysql_query($query, $database))) {
     print("Could not execute the query"); 
     die(mysql_error());
   }

   mysql_close($database);
   header("Location: index.php");
 }

 ?>

</div>

</div><!-- /.container -->

<?php
include "footer.php";

?>
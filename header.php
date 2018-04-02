<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>LibPung</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="starter-template.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
    <style>
		.jumbotron {
			background-image: url("bootstrap/assets/css/src/wallpaper.jpg");
			background-size: 100% 150%;
			background-repeat: no-repeat;
		}

		body{
			background-color: #f2f2f2;
		}

		h1{
			text-align: center;
			font-family: 'Aref Ruqaa', serif;
		}

		p {
			text-align: center;
			font-family: 'Crimson Text', serif;
		}
	</style>
	
	</head>
    <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span> 
            </button>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li><p class='navbar-text'>LIBPUNG</p></li>
              <li><a href="view_book.php">List of Books</a></li>
              <?php
                session_start();
                if(isset($_SESSION["role"])){
                    if($_SESSION['role'] == "admin")
                    print '<li><a href="index.php">List of User (admin only)</a></li>';
                }
               ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <?php
              if(!isset($_SESSION['login_user'])){
                print '<form id="signin" class="navbar-form navbar-right" role="form" action="login.php" method="post">
   
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" required="" autofocus="">                                        
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required="">   
                  </div>

                        <button type="submit" class="btn btn-primary" name="submit">Login</button>
                   </form>';
              }else{
                print "<li><p class='navbar-text'>Logged in as</p></li><li><a href='view_user.php'>".$_SESSION['login_user']."</a></li><li><a href='logout.php?logout=true'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
              }
              ?>
              
            </ul>
          </div>
        </div>
      </nav>
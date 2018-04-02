<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
$servername = "localhost";
          $dbusername = "root";
          $dbpassword = "";
          $dbname = "personal_library";

          if(!($database = mysql_connect($servername, $dbusername, $dbpassword))) die("Could not connect to database");

          if(!mysql_select_db($dbname, $database));
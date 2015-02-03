<?php

$username = "chookup";
$password = "Qwerty324!";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");

//select a database to work with
$selected = mysql_select_db("contacthookup",$dbhandle) 
  or die("Could not select DB");
  
?>
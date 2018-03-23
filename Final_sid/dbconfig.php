<?php
/*Establishing connection to passon database*/
$host = "localhost";
$username = "root" ;
$password = "";
$dbnm = "passon";
$conn = mysqli_connect($host,$username,$password,$dbnm);
  if(mysqli_connect_errno()){
	die("Connection Failed...:" .mysqli_connect_error()); 
  }
  //else {echo "Connected to DB<br>";}
?>
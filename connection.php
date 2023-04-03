<?php
$username = "root";
$password = "kalash72";
$db = "Goodreaders";
// Connecting to data base 
$conn = new mysqli( "localhost",$username,$password,$db);
// to check sucessfully connected or not 
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} else {
  //echo "connected";
}

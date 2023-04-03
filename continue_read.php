<?php
session_start();
try {
  require_once("connection.php");
} catch (error) {
header("Location: error.php?error=cant_connect_to_data_base");
}
$user_id=$_SESSION['username'];
$sql="SELECT books.book_title, books.author FROM continue_reading JOIN books ON continue_reading.book_id = books.id WHERE continue_reading.user_id = $user_id ";
if (!$result || mysqli_num_rows($result) == 0) {
}
?>
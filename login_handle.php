<?php
try {
require_once("connection.php");
} catch (error) {
header("Location: index.php?message=error_in_database");
}
require_once("User.php");

if (isset($_POST["email"]) && isset($_POST["password"])) {
$email = $_POST["email"];
$password = $_POST["password"];

  $user = new User($email, $password, $conn);
  if ($user->user_exists()) {
      if ($user->check_password()) {
          if($_SESSION['role']=='admin'){
            header("Location: add_books.php?message=hello_sir!!");
          } else {
            header("Location: profile.php?message=hello_sir!!");
          }
          
        } else {
            header("Location: index.php?message=wrong_password!!");
          }
      exit();
  } else {
      header("Location: index.php?message=user_does_not_exists");
      exit();
  }
}
?>
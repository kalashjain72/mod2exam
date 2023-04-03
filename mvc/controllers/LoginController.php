<?php
namespace Controller;

use Model\User;

/**
 * @file
 * It contains the functions related to login, logout and validations for the users.
 */

/**
 * Class that handles the login related operation of MVC project.
 */
class LoginController
{

  /**
   * If user logged in then redirect to home page.
   */
  function login()
  {
    if (isset($_SESSION['username'])) {
      header('location:/index.php');
    } else {
      include('view/loginView.php');
    }
  }

  /**
   * If user credentials are correct then redirect.
   * @return mixed
   *  Redirects user based on his entered credentials.
   */
  function validate()
  { 
    if (isset($_POST["email"]) && isset($_POST["password"])) {
      $email = $_POST["email"];
      $password = $_POST["password"];

      $user = new User($email, $password);
      if ($user->user_exists()) {
        if ($user->check_password()) {
          if ($_SESSION['role'] == 'admin') {
            header("Location: ../view/addBooks.php?message=hello_sir!!");
          } else {
            header("Location: ../view/profile.php?message=hello_sir!!");
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
  }

  //
  /**
   * When user logout destroy its session and redirect to home page.
   * @return mixed
   *  Destroys session and redirect to loginpage.
   */
  function logout()
  {
    session_destroy();
    header('location: /');
  }
}

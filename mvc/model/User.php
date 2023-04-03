<?php

namespace Model;
/**
 * @file
 * It contains the functions related to user .
 */
use Model\connection;
/**
 * Class that handles the user  related operation of MVC project.
 */
class User
{
  private $email;
  private $password;
  // Constructor
  function __construct($email, $password)
  {
    $this->email = $email;
    $this->password = $password;
  }
  /**
   * this fuction is used to find that user exits or not.
   * @return bool
   * 
   */
  public function user_exists()
  {
    $db = new connection();
    $sql = "SELECT email FROM users WHERE email='$this->email';";
    $result = mysqli_query($db->conn, $sql);
    if ($result->num_rows > 0) {
      return true;
    } else {
      return false;
    }
  }

   /**
   * this fuction is used to match password of user.
   * @return bool
   * this fucntion also sets the session 
   */
  public function check_password()
  {
    $db = new connection();
    // try querying sql database if successful perform operations else redirect
    $sql = "SELECT `email`, `password` ,`role` FROM `users` WHERE `email`='$this->email';";
    $result = mysqli_query($db->conn, $sql);
    $fatched_data = $result->fetch_assoc();

    // checks if password is correct or not
    if ($this->password != $fatched_data["password"]) {
      return false;
    } else {
      // sets the user variable in session and redirects to welcome page
      $_SESSION['valid'] = true;
      $_SESSION['username'] = $this->email;;
      $_SESSION['role'] = $fatched_data["role"];
      return true;
    }
  }
}

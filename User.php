<?php
session_start();
try {
  require_once("connection.php");
} catch (error) {
header("Location: error.php?error=cant_connect_to_data_base");
}

class User
{
    private $email;
    private $password;
    private $conn;
    function __construct($email, $password, $conn,)
    {
        $this->email = $email;
        $this->password = $password;
        $this->conn = $conn;
    }
    public function user_exists()
    {
      try {
          $sql = "SELECT email FROM users WHERE email='$this->email';";
          $result = mysqli_query($this->conn, $sql);
        } catch (error) {
            exit;
        }
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_password()
    {
        // try querying sql database if successful perform operations else redirect
        try {
            $sql = "SELECT `email`, `password` ,`role` FROM `users` WHERE `email`='$this->email';";
            $result = mysqli_query($this->conn, $sql);
        } catch (error) {
            return false;
        }
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

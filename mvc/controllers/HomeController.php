<?php

namespace Controller;
/**
 * @file
 * It contains the function to show home page.
 */
/**
 * Home controller
 *
 * PHP version 5.4
 */
/**
 * Class that handles the home page of MVC project.
 */
class HomeController 
{
    public function home()
    { 
      echo "hi";
        header("Location: ../view/loginView.php");
    }
}
?>
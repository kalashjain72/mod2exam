<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

/**
 * @file
 * provides routing for the mvc blog application.
 */

$controller = 'Home';
$function = 'home';

// Getting the values of controller from url.
if (isset($_GET['controller']) && $_GET['controller'] != '') {
  $controller = $_GET['controller'];
}

// Getting the values of function from url.
if (isset($_GET['function']) && $_GET['function'] != '') {
  $function = $_GET['function'];
}
session_start();

// Including the autoloader.
require_once ('vendor/autoload.php');

// Including the required controller and functions file, if not exist then shown error.
if (file_exists('controllers/' . $controller . 'Controller.php')) {
  $class = '\\Controller\\' . $controller . 'Controller';
  $obj = new $class();
  if (method_exists($obj, $function)) {
    $obj->$function();
  }
  else {
    include('view/error.php');
  }
}
else {
  include('view/error.php');
}
?>


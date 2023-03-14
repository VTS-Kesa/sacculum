<?php
  use Kesa\Sacculum\Core\Router;
  // Set error reporting
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // Load Composer's autoloader
  require_once '../vendor/autoload.php';

  // Create a new router
  $router = new Router();
  // Run the router
  $router->run();
?>

<?php
/**
 * API entry point.
 * php version 8.2
 *
 * @file
 * @category Core
 * @package  Kesa\Sacculum
 * @author   Zvonimir Rudinski <zvonimir.rudinski@noubis.com>
 * @license  Not licensed
 * @link     https://github.com/VTS-Kesa/sacculum
 */
use Kesa\Sacculum\Core\Router;
use Dotenv\Dotenv;

// Load Composer's autoloader
require_once '../vendor/autoload.php';

// Load environment variables
Dotenv::createImmutable('../')->load();

  // Set error reporting
if ($_ENV['ENVIRONMENT'] !== 'prod') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
    
// Create a new router
$router = new Router();
// Run the router
$router->run();
?>

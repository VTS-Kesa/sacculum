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
use Kesa\Sacculum\Core\Response;
use Kesa\Sacculum\Core\Exception\BaseException;
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

try 
{
    // Run the router
    $router->run();
}
catch (BaseException $e)
{
    // Catch and handle BaseException and its descendants
    echo new Response(
        [
        'status' => 'error',
        'message' => $e->getMessage(),
        'code' => $e->getCode()
        ]
    );
}
?>

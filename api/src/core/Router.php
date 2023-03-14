<?php
/**
 * API Router.
 * php version 8.2
 *
 * @file
 * @category Core
 * @package  Kesa\Sacculum\Core\Router
 * @author   Zvonimir Rudinski <zvonimir.rudinski@noubis.com>
 * @license  Not licensed
 * @link     https://github.com/VTS-Kesa/sacculum
 */
namespace Kesa\Sacculum\Core;

use Steampixel\Route;

/**
 * Router for the API.
 *
 * @category Core
 * @package  Kesa\Sacculum\Core\Router
 * @author   Zvonimir Rudinski <zvonimir.rudinski@noubis.com>
 * @license  Not licensed
 * @link     https://github.com/VTS-Kesa/sacculum
 */
class Router
{
    /**
     * Constructor where all the routes and their handlers are defined.
     */
    public function __construct()
    {
        // Set headers
        header('Content-Type: application/json');
        // Add routes
        Route::add(
            '/', function () {
                return json_encode(['message' => 'Welcome to the API!']);
            }
        );
    }

    /**
     * Run the router.
     *
     * @return void
     */
    public function run()
    {
        Route::run('/');
    }
}

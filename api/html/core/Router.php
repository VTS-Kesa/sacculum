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
use Kesa\Sacculum\Core\Response;
use Kesa\Sacculum\Core\Exception\NotFoundException;

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
        // Set 404 handler
        Route::pathNotFound(
            function () {
                throw new NotFoundException();
            }
        );
        // Add routes
        Route::add(
            '/', function () {
                return new Response(['message' => 'Hello API!']);
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

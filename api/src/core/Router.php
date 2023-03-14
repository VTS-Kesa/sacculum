<?php

namespace Kesa\Sacculum\Core;

use Steampixel\Route;

/**
 * Router for the API.
 */
class Router {
  // Constructor where all the routes and their handlers are defined.
  public function  __construct() {
    // Set headers
    header('Content-Type: application/json');
    // Add routes
    Route::add('/', function() {
      return json_encode(['message' => 'Welcome to the API!']);
    });
  }

  // Run the router.
  public function run() {
    Route::run('/');
  }
}

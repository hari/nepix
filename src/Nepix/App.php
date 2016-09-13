<?php namespace Nepix;
// start the session
session_start();

use Nepix\Core\Route;
use Nepix\Core\Request;
use Nepix\Database\Connection;
require_once 'Utils/Helpers.php';

class App {

  public static function run($routes, $minify = false) {
    $uri = get_current_uri();
    $current_route = get_current_route();
    $called = false;
    foreach ($routes as $route) {
      if ($current_route->is_callable($route)) {
        //this is the route we need
        //call the route's method
        echo minify($route->call(Request::getInstance()), $minify);
        $called = true;
        break;
      }
    }
    Connection::close();
    if (!$called) {
      throw new \Exception("Error Processing Request", 1); 
    }
  }

}
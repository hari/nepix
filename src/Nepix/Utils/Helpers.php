<?php

use Nepix\Core\Route;

function asset($path) {
  return DIR_ASST . "/$path";
}

function minify($html, $yes = false) {
  return $html;
}

function get_current_uri() {
  return str_replace(['index.php', '/'. strtolower(APP) .'/','/'. strtolower(APP) .'/'. DIR_ASST], 
    '' , explode('?', $_SERVER['REQUEST_URI'])[0]);
}

function get_current_route() {
  return new Route(strtolower($_SERVER['REQUEST_METHOD']), get_current_uri(), '', '');
}

function dd($s) {
  die(var_dump($s));
}

function redirect($page) {
  header("Location: $page");
  exit;
}

function route($name) {
  global $routes;
  $final = array_filter($routes, function($route) use ($name) {
    return $route->getName() == $name;
  });
  if (count($final) == 0) {
    throw new \Exception("No route with name {$name}", 1);
  }
  //check if its the index page
  return $final[array_keys($final)[0]]->getUri() != "" ? $final[array_keys($final)[0]]->getUri() : '/index.php';
}
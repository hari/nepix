<?php namespace Demo;

use Nepix\Core\Route;

// collection of application routes as Route object
// all the routes will be defined here
return [
 //index page
 Route::get('', 'index', 'PageController', 'home'),
 Route::get('home', function() {
  return Models\User::create(['full_name' => 'harimaok']) ? 'created' : 'creation failed';
 })
];
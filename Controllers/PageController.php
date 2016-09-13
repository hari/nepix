<?php namespace Demo\Controllers;

use Demo\Models\User;
use Nepix\Core\View;

use Nepix\Controller\Controller;

class PageController extends Controller {

  public function index() {
    $numb = 'Your random number is '.  rand(4531, 9481);
    return View::make('index', compact('numb'));
  }

}
<?php

//load autoload.php, config.php and routes.php... the path can be anywhere
require_once 'autoload.php';
require_once 'config.php';
$routes = require_once 'routes.php';

\Nepix\App::run($routes);
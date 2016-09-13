<?php

spl_autoload_register(function($class_name) {
  if (stristr($class_name, 'Nepix')) {
    require_once DIR_SRC . str_replace('\\', '/', $class_name) . '.php';
    return;
  }
  require_once str_replace([APP . '\\', '\\'], ['', '/'], $class_name) . '.php';
});
<?php namespace Nepix\Database;

class Connection {

  private static $connection;

  private function __construct() {

  }

  public static function get() {
    if (self::$connection == null) {
      $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
      $count = 0;
      do {
        try {
          $count++;
          self::$connection = new \PDO($dsn, DB_USER, DB_PASS);
        } catch (Exception $e) {
          self::$connection = null;
        }
      } while (self::$connection == null || $count < 5);
    }
    return self::$connection;
  }

  public static function close() {
    if (self::$connection != null) {
      self::$connection = null;
    }
  }

}
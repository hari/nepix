<?php namespace Demo\Database;

use Nepix\Database\AbstractTable;

/**
 * ---------------------------------------------------------------
 * | id | name | batch | reg_no | created_by | role | created_on |
 * ---------------------------------------------------------------
 */
class UserTable extends AbstractTable {

  protected static $instance;

  private function __construct() {
    $this->table_name = 'users';
  }

  public function create() {
    $sql = "CREATE TABLE IF NOT EXISTS `" . $this->getTableName() . "` (
           `id` INT NOT NULL AUTO_INCREMENT ,
           `full_name` VARCHAR(50) NOT NULL ,
           `created_by` INT NOT NULL ,
           `created_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
           PRIMARY KEY (`id`))";
    return $this->execute($sql);
  }

  public static function getInstance() {
    if (self::$instance == null) {
      self::$instance = new self;
    }
    return self::$instance;
  }

}
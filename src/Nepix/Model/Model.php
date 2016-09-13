<?php namespace Nepix\Model;

abstract class Model {
  
  /** @var Array The property-value pair of all the attributes of model */
  protected $instance = [];

  public function getAttribute($prop) {
    if (array_key_exists($prop, $this->instance)) {
      return $this->instance[$prop];
    }
    return null;
  }

  /**
   * A wrapper to execute for creating a new Record using AbstractTable's Insert method
   *
   * @param $abs_table Nepix\Database\AbstractTable
   * @param $prop      array The key-value pair representing a new record according to table structure
   * 
   * @see Nepix\Database\AbstractTable
   *
   * @return boolean true if successfully created
   */
  protected static function _create($abs_table, $prop = []) {
    return $abs_table->insert($prop);
  }

  /**
   * A wrapper to execute for creating a new Record using AbstractTable's Delete method
   *
   * @param $abs_table Nepix\Database\AbstractTable
   * @param $wheres    array
   * 
   * @see Nepix\Database\AbstractTable
   *
   * @return boolean true if successfully deleted
   */
  protected static function _delete($abs_table, $wheres = []) {
    return $abs_table->delete($wheres);
  }
  
}
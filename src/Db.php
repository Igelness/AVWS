<?php

/**
 *
 * @author A. Vorobyov <a.a.vorobyev0@gmail.com>
 *
 * @license https://opensource.org/licenses/MIT MIT Public license
 *
 * @package AVWS;
 */

namespace AVWS;
use PDO;

class Db {
  private $db;

  /**
   * Initialize PDO database connection upon creating the object
   *
   * @param string $host
   * @param string $dbname
   * @param string $user
   * @param string $password
   * @param string $charset
   */
  public function __construct(string $host, string $dbname, string $user, string $password, string $charset = 'utf8') {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $this->db = new PDO($dsn, $user, $password);
  }

  /**
   *
   * @param string $table
   * @return false|\PDOStatement
   */
  public function countTableData(string $table) {
    $sql = "SELECT COUNT(*) FROM ${table}";
    $result = $this->db->query($sql);
    return $result;
  }

  /**
   *
   * @param string $table
   * @param string $col
   * @return false|\PDOStatement
   */
  public function getTableData(string $table, string $col = "*") {
    $sql = "SELECT {$col} FROM {$table}";
    $result = $this->db->query($sql);
    return $result;
  }

  /**
   * String values need to be interpolated
   * Example: '\'test\''
   *
   * @param string $table
   * @param array $values
   */
  public function addTableData(string $table, array $values) {
    $sql = "INSERT INTO {$table} VALUES(";
    foreach ($values as $k => $value) {
      if($values[count($values) -1] === $value) {
        if($k === count($values) - 1) {
          $sql = $sql . $value;
        } else {
          $sql = $sql . $value . ', ';
        }
      } else {
        $sql = $sql . $value . ', ';
      }
    }
    $sql = $sql . ")";
    echo "<br><br><br> {$sql} <br><br><br>";
    $this->db->query($sql);
  }

  /**
   *
   * @param string $table
   * @return void
   */
  public function deleteTableData(string $table) {
    $sql = "DELETE FROM {$table}";
    $this->db->query($sql);
  }

  /**
   *
   * @param array $tables
   * @return void
   */
  public function deleteTablesData(array $tables) {
    foreach ($tables as $table) {
      $sql = "DELETE FROM {$table}";
      $this->db->query($sql);
    }
  }
}
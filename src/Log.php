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

require_once ('Db.php');

class Log {
  private $db;

  /**
   * Importing Db class and initializing PDO database connection upon creating the object
   *
   * @param string $host
   * @param string $dbname
   * @param string $user
   * @param string $password
   * @param string $charset
   */
  public function __construct(string $host, string $dbname, string $user, string $password, string $charset = 'utf8') {
    $this->db = new Db($host, $dbname, $user, $password, $charset);
  }

  /**
   * Implying your DB table has timestamp field
   *
   * @param string $logTable
   * @param $message
   */
  public function insertLogTableData(string $logTable, $message) {
    $id = 0;
    $date = '\'' . date('Y-m-d H:i:s') . '\'';
    $values = [$id, $message, $date];
    $this->db->addTableData($logTable, $values);
  }

  /**
   *
   * @param string $logTable
   * @return false|\PDOStatement
   */
  public function getLogTableData(string $logTable) {
    $data = $this->db->getTableData($logTable);
    return $data;
  }

  /**
   *
   * @param string $logTable
   */
  public function deleteLogTableData(string $logTable) {
    $this->db->deleteTableData($logTable);
  }
}

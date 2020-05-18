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

class Session {

  public function __construct() {
    session_start();
  }

  /**
   *
   * @param $name
   * @param $value
   */
  public function createSessionVariable($name, $value) {
    $_SESSION[$name] = $value;
  }

  /**
   *
   * @param $name
   * @return mixed
   */
  public function getSessionVariable($name) {
    return $_SESSION[$name];
  }

  /**
   *
   * @param $name
   */
  public function deleteSessionVariable($name) {
    unset($_SESSION[$name]);
  }

  /**
   *
   * @param $name
   * @return bool
   */
  public function isSessionVariable($name) {
    return isset($_SESSION[$name]) ? true : false;
  }
}
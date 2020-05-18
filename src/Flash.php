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

require_once ('Session.php');

/**
 *
 * Example of using Session.php class
 *
 */
class Flash {
  private $session;

  public function __construct() {
    $this->session = new namespace\Session();
  }

  /**
   * @param $name
   * @param $msg
   */
  public function setMessage($name, $msg) {
    $this->session->createSessionVariable($name, $msg);
  }

  /**
   * @param $name
   * @return bool|mixed
   */
  public function getMessage($name) {
    $var = $this->session->getSessionVariable($name);
    if(!empty($var)) {
      return $var;
    }
    return false;
  }
}
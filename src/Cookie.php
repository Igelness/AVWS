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

class Cookie {
  const TIME = 3600;

  /**
   *
   * @param $name
   * @param $value
   * @param int $time
   */
  public function setCookie($name, $value, $time = self::TIME) {
    setcookie($name, $value, time() + $time);
  }

  /**
   *
   * @param $name
   * @return bool|mixed
   */
  public function getCookie($name) {
    if(isset($_COOKIE[$name])) {
      return $_COOKIE[$name];
    }
    return false;
  }

  /**
   *
   * @param $name
   */
  public function deleteCookie($name) {
    setcookie($name, '');
  }
}

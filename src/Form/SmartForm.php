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

require_once (__DIR__ . "/Form.php");

/**
 *
 * Sets the cookies into input values if you set cookies after submitting the form
 *
 * Example:
 *
 * Submit button goes to index.php script and in index.php you set cookies after getting $POST data
 * foreach ($_POST as $name => $item) {
     setcookie(strtoupper($name), trim($item), time() + 3600 );
   }
 *
 */

final class SmartForm extends Form {
  /**
   * Checks if tag has a cookie
   *
   * @param array $attr
   * @return array|bool
   */
  private function isCookie(array $attr) {
    $name = $attr['name'];
    if(isset($_COOKIE[strtoupper($name)])) {
      $cookieName = $_COOKIE[strtoupper($name)];
      $attributes = $this->argsToString($attr);
      $data = ['cookieName'=>$cookieName, 'attributes'=>$attributes];
      return $data;
    }
    return false;
  }

  /**
   *
   * @param array $attr
   * @return string
   */
  public function input(array $attr)
  {
    if($this->isCookie($attr)) {
      $data = $this->isCookie($attr);
      return "<input "
          . htmlspecialchars($data['attributes'])
          . " value = {$data['cookieName']} "
          . ">";
    } else {
      return parent::input($attr);
    }
  }

  /**
   *
   * @param array $attr
   * @return string
   */
  public function password($attr)
  {
    if($this->isCookie($attr)) {
      $data = $this->isCookie($attr);
      return "<input "
          . "type='password' "
          .htmlspecialchars($data['attributes'])
          ." value = {$data['cookieName']} "
          . " >";
    } else {
      return parent::input($attr);
    }
  }

  /**
   *
   * @param array $attr
   * @return string
   */
  public function textarea($attr)
  {
    if($this->isCookie($attr)) {
      $data = $this->isCookie($attr);
      $pattern = '/value = (.*? )/';
      $filteredAttributes = preg_replace($pattern, '', $data['attributes']);

      return "<textarea "
          . htmlspecialchars($filteredAttributes)
          . " >"
          . htmlspecialchars($data['cookieName'])
          . " </textarea>";
    } else {
      return parent::textarea($attr);
    }
  }
}



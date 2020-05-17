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

/**
 *
 * Makes forms and form elements creation Object Oriented
 *
 */

class Form {
  /**
   *
   * Creates default input
   *
   * @param array $attr
   * @return string
   */
  public function input(array $attr) {
    $attributes = $this->argsToString($attr);
    return "<input " . htmlspecialchars($attributes) . " >";
  }

  /**
   *
   * Creates input with type = submit
   *
   * @param $attr
   * @return string
   */
  public function submit($attr) {
    $attributes = $this->argsToString($attr);
    return "<input "
        . "type='submit' "
        .htmlspecialchars($attributes)
        . " >";
  }

  /**
   *
   * Creates input with type = password
   *
   * @param $attr
   * @return string
   */
  public function password($attr) {
    $attributes = $this->argsToString($attr);
    return "<input "
        . "type='password' "
        .htmlspecialchars($attributes)
        . " >";
  }

  /**
   *
   * Creates textarea
   *
   * @param $attr
   * @return string
   */
  public function textarea($attr) {
    $attributes = $this->argsToString($attr);
    $pattern = '/value = (.*? )/';
    $filteredAttributes = preg_replace($pattern, '', $attributes);

    return "<textarea "
        . htmlspecialchars($filteredAttributes)
        . " >"
        . htmlspecialchars($attr['value'])
        . " </textarea>";
  }

  /**
   *
   * Open form tag
   *
   * @param $attr
   * @return string
   */
  public function open($attr) {
    $attributes = $this->argsToString($attr);
    return "<form "
        . htmlspecialchars($attributes)
        . ">";
  }

  /**
   *
   * Close form tag
   *
   * @return string
   */
  public function close() {
    return '</form>';
  }

  /**
   *
   * Transforms an array of attributes into a string
   *
   * @param array $args
   * @return string
   *
   */
  protected function argsToString(array $args):string {
    $str = '';
    foreach ($args as $k => $v) {
      if(!is_string($k) || !is_string($v)) {
        continue;
      }
      $str = $str . trim($k) . " = ";
      $str = $str . "'" . trim($v) . "'" . " ";
    }
    return $str;
  }
}

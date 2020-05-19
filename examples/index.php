<?php

require_once('../src/Cookie.php');
require_once ('../src/Flash.php');


if(!isset($_POST['submit'])) {
  header('Location: /using.php');
} else {
  $flash = new AVWS\Flash();
  echo $flash->getMessage('msg1');
}
foreach ($_POST as $name => $item) {
  setcookie(strtoupper($name), trim($item), time() + 3600 );
}

/* COOKIE */

$cookie = new AVWS\Cookie();
$cookie->setCookie('TEST', 'TESTTTT');
$cookie->deleteCookie('TEST');






<?php

require_once('../src/Cookie.php');


if(!isset($_POST['name']) || empty($_POST['name'])
    || !isset($_POST['pass']) || empty($_POST['pass'])
    || !isset($_POST['textarea']) || empty($_POST['textarea'])) {
  header('Location: /using.php');
}
foreach ($_POST as $name => $item) {
  setcookie(strtoupper($name), trim($item), time() + 3600 );
}

$test = new AVWS\Cookie();
$test->setCookie('TEST', 'TESTTTT');
$test->deleteCookie('TEST');



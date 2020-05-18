<?php

require_once("../src/Form/SmartForm.php");
require_once ("../src/Session.php");
require_once ("../src/Flash.php");

$form = new AVWS\SmartForm();
/*$session = new AVWS\Session();*/

/*$session->createSessionVariable('test', 5);
echo $session->isSessionVariable('test') . "<br>";
echo $session->getSessionVariable('test') . "<br>";
$session->deleteSessionVariable('test');*/
/*if(!isset($_SESSION['test'])) {
  echo 'deleted test' . "<br>";
}*/

$flash = new AVWS\Flash();

$flash->setMessage('msg1', 'registration has been successful');

echo $form->open(['action'=>"index.php", 'method'=>'POST']);
echo $form->input(['type'=>'text', 'placeholder'=>'Ваше имя', 'name'=>'name']);
echo $form->password(['placeholder'=>'Ваш пароль', 'name'=>'pass']);
echo $form->textarea(['placeholder'=>'123', 'value'=>'!!!', 'name'=>'textarea']);
echo $form->submit(['value'=>'Отправить', 'name'=>'submit']);
echo $form->close();


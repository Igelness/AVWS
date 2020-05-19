<?php

require_once("../src/Form/SmartForm.php");
require_once ("../src/Session.php");
require_once ("../src/Flash.php");
require_once ('../src/Db.php');
require_once ('../src/Log.php');

/* Session + Flash */

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

/* Form */

$form = new AVWS\SmartForm();
echo $form->open(['action'=>"index.php", 'method'=>'POST']);
echo $form->input(['type'=>'text', 'placeholder'=>'Ваше имя', 'name'=>'name']) . "<br>" . "<br>";
echo $form->password(['placeholder'=>'Ваш пароль', 'name'=>'pass']) . "<br>" . "<br>";
echo $form->textarea(['placeholder'=>'123', 'value'=>'...', 'name'=>'textarea']) . "<br>" . "<br>";
echo $form->submit(['value'=>'Отправить', 'name'=>'submit']);
echo $form->close();

/* DB */

/*$db = new AVWS\Db('localhost', 'forum','root', 'password', 'utf8');

$data = $db->getTableData('news_contents');

$db->deleteTableData('news');

foreach ($data as $item) {
  echo $item['news_id'];
  echo $item['content'] . "<br>";
}

$count = $db->countTableData('news_contents');
$values = [8, '\'test\'', 8];
$db->addTableData('news_contents', $values);*/

$log = new AVWS\Log('localhost', 'logging','root', 'password', 'utf8');
$log->insertLogTableData('my_log', '\'testtest\'');
$data = $log->getLogTableData('my_log');
foreach ($data as $item) {
  echo $item['message'] . "<br>";
  echo $item['log_date'] . "<br>";
}
$log->deleteLogTableData('my_log');





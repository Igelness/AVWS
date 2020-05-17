<?php

require_once("../src/Form/SmartForm.php");

$form = new AVWS\SmartForm();

echo $form->open(['action'=>"index.php", 'method'=>'POST']);
echo $form->input(['type'=>'text', 'placeholder'=>'Ваше имя', 'name'=>'name']);
echo $form->password(['placeholder'=>'Ваш пароль', 'name'=>'pass']);
echo $form->textarea(['placeholder'=>'123', 'value'=>'!!!', 'name'=>'textarea']);
echo $form->submit(['value'=>'Отправить']);
echo $form->close();


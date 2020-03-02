<?php
  require 'classes/InputFields.php';

  // Создаем объект
  $input = new InputText();

  // Устанавливаем стили
  $input->addStyle([
    'width' => '300px',
    'border-radius' => '5px',
    'border' => '1px solid silver',
    'background' => '#fcfcfc',
    'padding' => '10px 20px'
  ]);

  // Выводим на экран
  $input->show();
?>

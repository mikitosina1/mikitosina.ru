<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$fav_cars = $_POST['fav_cars'];
$fav_films = $_POST['fav_films'];
$arr_films = explode(",", $fav_films);

  // Проверка на верные данные
  if(strlen($name) < 3)
    $eror = "Имя не менее 3 символов";
  else if(strlen($email) < 5)
    $eror = "Email не менее 5 символов";
  else if(strlen($phone) < 10)
    $eror = "Телефон не менее 10 символов";
  else if(count($fav_cars) == 0) 
    $eror = "Вы не выбрали ни одного любимого автомобиля";
  else if(count($arr_films) <= 1)
    $eror = "Необходимо написать не менее 2 любимых фильмов";

  if($eror != '') {
    echo $eror;
    exit(); 
  }

  $data = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'fav_cars' => $fav_cars,
    'fav_films' => $arr_films
  ];

  echo "<h1>Вся информация</h1>";
  foreach($data as $key => $value) {
        if($key == 'fav_cars' || $key == 'fav_films') {
      echo "<b>".$key.":</b><ul>";

      foreach($value as $el) {
        echo "<li>".$el."</li>";
      }

      echo "</ul><br>";
    } else 
      echo $value.'<br>';
  }
?>

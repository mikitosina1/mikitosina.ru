<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP форма</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <!-- Обработка формы будет вестись на странице check.php -->
    <form action="./check.php" method="post">
        <h3>Форма регистрации</h3>
        <input type="text" name="name" placeholder="Введите имя">
        <input type="text" name="email" placeholder="Введите email">
        <input type="text" name="phone" placeholder="Введите телефон">
        <p class="hint">Выберите любмые автомобили</p>
        <select name="fav_cars[]" multiple>
            <option value="bmw">BMW</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
            <option value="volvo">Volvo</option>
            <option value="ford">Ford</option>
        </select>
        <p class="hint">Введите любимые фильмы. Минимум 2 или более. Вводить через запятую</p>
        <input type="text" name="fav_films" placeholder="Любимые фильмы">
        <button type="submit">Отправить</button>
    </form>

    <a href="/">На домашнюю страницу!</a>
</body>
</html>

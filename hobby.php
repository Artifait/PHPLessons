<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>HOBBY</h2>
  <form method="POST">
    <p><strong>1.Какие хобби тебе нравятся?</strong></p>
    <label><input type="checkbox" name="hobbies[]" value="Чтение"> Чтение</label><br>
    <label><input type="checkbox" name="hobbies[]" value="Спорт"> Спорт</label><br>
    <label><input type="checkbox" name="hobbies[]" value="Рисование"> Рисование</label><br>
    <label><input type="checkbox" name="hobbies[]" value="Игры"> Игры</label><br>

    <p><strong>2.Когда ты предпочитаешь заниматься хобби?</strong></p>
    <label><input type="radio" name="time" value="Утром" required> Утром</label><br>
    <label><input type="radio" name="time" value="Днем"> Днем</label><br>
    <label><input type="radio" name="time" value="Вечером"> Вечером</label><br>
    <label><input type="radio" name="time" value="Ночью"> Ночью</label><br>

    <p><strong>3.Какой жанр фильмов тебе ближе всего?</strong></p>
    <select name="genre" size="4" required>
      <option value="Комедия">Комедия</option>
      <option value="Фантастика">Фантастика</option>
      <option value="Ужасы">Ужасы</option>
      <option value="Драма">Драма</option>
    </select><br><br>

    <input type="submit" value="Отправить">
  </form>

  <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      echo "<h3>Ваши ответы:</h3>";

      if (isset($_POST['hobbies'])) {
        echo "<p>Выбранные хобби: " . implode(', ', $_POST['hobbies']) . "</p>";
      } 
      else {
        echo "<p>Хобби не выбраны</p>";
      }

      $time = $_POST['time'] ?? 'не указано';
      echo "<p>Предпочтительное время: $time</p>";

      $genre = $_POST['genre'] ?? 'не выбран';
      echo "<p>Любимый жанр фильма: $genre</p>";
    }
  ?>
</body>
</html>

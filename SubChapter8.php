<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $numbers = [1, 4, 9, 16];
    // Добавить
    $numbers[] = 25;
    echo $numbers[4];   // 25

    // Словарь
    $numbers = [1=> 1, 2=> 4, 5=> 25, 4=> 16];
    echo $numbers[2];   // 4

    // Перебор массива
    $users = ["Tom", "Sam", "Bob", "Alice"];
    $num = count($users);
    for($i=0; $i < $num; $i++)
    {
        echo "$users[$i] <br />";
    }

    foreach($users as $element)
    {
        echo "$element<br />";
    }

    $users = [1 => "Tom", 4 => "Sam", 5 => "Bob", 21 => "Alice"];
    foreach($users as $key => $value)
    {
      echo "$key - $value<br />";
    }
    ?>
  ?>
</body>
</html>

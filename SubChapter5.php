<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $a = 4;
    if($a>0){
        echo "Переменная a больше нуля";
    }
    echo "<br>конец выполнения программы";
  ?>

  if (0) {}       // false
  if (-0.0) {}    // false
  if (-1) {}      // true 
  if ("") {}      // false (пустая строка)
  if ("a") {}     // true (непустая строка)
  if (null) {}    // false (значие отсутствует)

  $a = 1;
  $b = 2;
  $z = $a < $b ? $a + $b : $a - $b;
  echo $z;
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    // true
    $a = (2 == "2");   
    // false тк разные типы
    $b = (2 === "2");   

    $a = 2 <=> 2;     // 0    (эквивалентно 2 == 2)
    $b = 3 <=> 2;     // 1    (эквивалентно 3 > 2)
    $c = 1 <=> 2;     // -1   (эквивалентно 1 < 2)
    echo "a=$a   b=$b   c=$c";  // a=0  b=1  c=-1
  ?>
</body>
</html>

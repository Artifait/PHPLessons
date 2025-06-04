<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $a = 3;
    switch($a)
    {
        case 1: 
            echo "сложение";
            break;
        case 2: 
            echo "вычитание";
            break;
        case 3: 
            echo "умножение";
            break;
        case 4: 
            echo "деление";
            break;
    }

    $a = 2;
    $operation = match($a)
    {
        1 => "сложение",
        2 => "вычитание",
        default => "действие по умолчанию",
    };
    echo $operation;


    switch (8.0) {
      case "8.0":
        $result = "строка";
        break;
      case 8.0:
        $result = "число";
        break;
    }
    echo $result; // строка

    match (8.0) {
      "8.0" => $result = "строка",
      8.0 => $result = "число"
    };
    echo $result; // число
  ?>
</body>
</html>

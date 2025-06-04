<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    function displayInfo($name, $age)
    {
        echo "<div>Имя: $name <br />Возраст: $age</div><hr>";
    }
    
    displayInfo("Tom", 36);
    displayInfo("Bob", 39);
    displayInfo("Sam", 28);
    displayInfo(age: 23, name: "Art");


    function sum(...$numbers)
    {
        $result = 0;
        foreach($numbers as $number) {
            $result += $number;
        }
        echo "<p>Сумма: $result</p>";
    }
    sum(1, 2, 3);
    sum(2, 3);
    sum(4, 5, 8, 10);
  ?>
</body>
</html>

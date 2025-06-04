<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $families = [["Tom", "Alice"], ["Bob", "Kate"]];
    echo $families[0][0] . "<br />";  //Tom
    echo $families[0][1] . "<br />";  //Alice
    echo $families[1][0] . "<br />";  //Bob
    echo $families[1][1];   //Kate
  ?>
</body>
</html>

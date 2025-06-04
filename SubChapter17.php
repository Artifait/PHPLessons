<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $hello = function($name)
    {
      return "<h2> Hello $name </h2>";
    };
    $hello("Art");
  ?>
</body>
</html>

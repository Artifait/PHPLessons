<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <ul>
    <?php
        for ($i = 1; $i < 10; $i++)
        {
          echo "<li>" . "Квадрат числа $i равен " . $i * $i . "</li>";
        }

        $counter = 1;
        while($counter<10):
            echo $counter * $counter . "<br />";
            $counter++;
        endwhile;
        $counter = 1;
        do
        {
            echo $counter * $counter . "<br />";
            $counter++;
        }
        while($counter<10);
        
        echo "<table>";

        for ($i = 1; $i < 10; $i++)
        {
            echo "<tr>";
            for ($j = 1; $j < 10; $j++)
            {
                echo "<td>" . $i * $j . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    ?>
  </ul>
</body>
</html>

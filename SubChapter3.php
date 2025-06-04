<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  #2-3 типы и переменные
  $age = 30;
  $price = 19.99;
  $name = "Елена";
  $isMember = true;
  $skills = ["HTML", "CSS", "PHP"];
  class Person {
      public $firstName;
      public $lastName;

      public function __construct($first, $last) {
          $this->firstName = $first;
          $this->lastName = $last;
      }

      public function getFullName() {
          return $this->firstName . " " . $this->lastName;
      }
  }
  $person = new Person("Иван", "Петров");
  $nothing = null;
  echo "$name";
  echo "$age";
  echo "$price";
  echo ($isMember ? "Да" : "Нет");
  echo "<p>Person: " . $person->getFullName() . "</p>";

?>

</body>
</html>

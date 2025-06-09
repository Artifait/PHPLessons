
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php

  class QuadraticEquationResult {
    public ?float $x1 = null;
    public ?float $x2 = null;
    public float $discriminant;
    public string $message;

    public function __construct(float $discriminant, ?float $x1 = null, ?float $x2 = null, string $message = '') {
        $this->discriminant = $discriminant;
        $this->x1 = $x1;
        $this->x2 = $x2;
        $this->message = $message;
    }

    public function toString(): string {
        $result = "Дискриминант D = {$this->discriminant}. ";
        if ($this->x1 !== null && $this->x2 !== null) {
            $result .= "Корни: x₁ = {$this->x1}, x₂ = {$this->x2}.";
        } elseif ($this->x1 !== null) {
            $result .= "Один корень: x = {$this->x1}.";
        } else {
            $result .= $this->message;
        }
        return $result;
    }
  }

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = 1;
    $b = 1;
    $c = 1;

    if(isset($_POST["a"])) {
        $a = (float)$_POST["a"];
    }
    if(isset($_POST["b"])) {
        $b = (float)$_POST["b"];
    }
    if(isset($_POST["c"])) {
      $c = (float)$_POST["c"];
    }
    $d = $b ** 2 - 4 * $a * $c;

    echo "<h3>Результат:</h3>";

    if($d > 0)
    {
      $sqrtD = sqrt($d);
      $x1 = (-$b + $sqrtD) / (2 * $a);
      $x2 = (-$b - $sqrtD) / (2 * $a);
      echo "<p>x1 = " . $x1 . ", x2 = " . $x2 . "</p>";
    }
    elseif($d == 0)
    {
      $x1 = -$b / (2 * $a);
      echo "<p>x1 = " . $x1 ."</p>";
    }
    else
    {
      echo "Корней нет";
    } 
  }
  ?>
  <h3>Форма ввода данных</h3>
  <form method="POST">
      <p>A: <input type="number" name="a" /></p>
      <p>B: <input type="number" name="b" /></p>
      <p>C: <input type="number" name="c" /></p>
      <input type="submit" value="Отправить">
  </form>
</body>
</html>

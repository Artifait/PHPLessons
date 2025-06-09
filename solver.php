<?php
  require_once 'QuadEquationResult.php';

  function solveQuadraticEquation(float $a, float $b, float $c): QuadEquationResult {
    if ($a == 0) {
      throw new InvalidArgumentException("'a' не может быть равен нулю");
    }

    $d = $b * $b - 4 * $a * $c;

    if ($d < 0) {
      return new QuadEquationResult($a, $b, $c, null, null, 'no_roots');
    } elseif ($d == 0) {
      $x = -$b / (2 * $a);
      return new QuadEquationResult($a, $b, $c, $x, null, 'one_root');
    } else {
      $sqrtD = sqrt($d);
      $x1 = (-$b + $sqrtD) / (2 * $a);
      $x2 = (-$b - $sqrtD) / (2 * $a);
      return new QuadEquationResult($a, $b, $c, $x1, $x2, 'two_roots');
    }
  }
?>

<?php
  class QuadEquationResult {
    private float $a;
    private float $b;
    private float $c;
    private ?float $x1;
    private ?float $x2;
    private string $status;

    public function __construct(float $a, float $b, float $c, ?float $x1, ?float $x2, string $status) {
      $this->a = $a;
      $this->b = $b;
      $this->c = $c;
      $this->x1 = $x1;
      $this->x2 = $x2;
      $this->status = $status;
    }

    public function __toString(): string {
      $equation = "{$this->a}x² + {$this->b}x + {$this->c} = 0";

      if ($this->status === 'no_roots') {
        return "$equation\nНет вещественных корней.";
      } elseif ($this->status === 'one_root') {
        return "$equation\nОдин корень: x = {$this->x1}";
      } elseif ($this->status === 'two_roots') {
        return "$equation\nДва корня: x₁ = {$this->x1}, x₂ = {$this->x2}";
      } else {
        return "$equation\nСтатус: неизвестен.";
      }
    }
  }
?>

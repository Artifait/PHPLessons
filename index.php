<?php
session_start();
require_once 'solver.php';

$mode = $_GET['mode'] ?? 'session';
$history = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $a = (float)($_POST['a'] ?? 0);
  $b = (float)($_POST['b'] ?? 0);
  $c = (float)($_POST['c'] ?? 0);

  try {
    $result = solveQuadraticEquation($a, $b, $c);

    if ($mode === 'session') {
      $_SESSION['history'][] = (string)$result;
      $history = $_SESSION['history'];
    } else {
      $cookieHistory = json_decode($_COOKIE['history'] ?? '[]', true);
      $cookieHistory[] = (string)$result;
      setcookie('history', json_encode($cookieHistory), time() + 3600);
      $history = $cookieHistory;
    }
  } catch (Exception $e) {
    $error = $e->getMessage();
  }
} else {
  if ($mode === 'session') {
    $history = $_SESSION['history'] ?? [];
  } else {
    $history = json_decode($_COOKIE['history'] ?? '[]', true);
  }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Решение квадратного уравнения</h1>

  <form method="post" action="?mode=<?= htmlspecialchars($mode) ?>">
    <label>Коэффициент a:<br>
      <input type="number" name="a" required>
    </label><br>
    <label>Коэффициент b:<br>
      <input type="number" name="b" required>
    </label><br>
    <label>Коэффициент c:<br>
      <input type="number" name="c" required>
    </label><br>
    <input type="submit" value="Решить">
  </form>

  <?php if (!empty($error)): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <div class="mode-switch">
    <strong>Режим:</strong>
    <a href="?mode=session">Сессии</a> |
    <a href="?mode=cookie">Куки</a>
  </div>

  <?php if (!empty($history)): ?>
    <h2>История решений:</h2>
    <div class="history">
      <?php foreach ($history as $entry): ?>
        <div class="card">
          <pre><?= htmlspecialchars($entry) ?></pre>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</body>
</html>

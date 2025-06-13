<?php
require __DIR__ . '/../vendor/autoload.php';
use App\View\Header;

$header = new Header('home');
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Autosalon Admin</title></head>
<body>
<?php $header->render(); ?>
<h1>Добро пожаловать в управление автосалоном</h1>
<p>Используйте меню для навигации.</p>
</body>
</html>


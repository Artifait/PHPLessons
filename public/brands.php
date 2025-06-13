<?php
require __DIR__ . '/../vendor/autoload.php';

use App\View\Header;
use App\Service\BrandService;

$pdo = (new App\Database())->getPdo();
$service = new BrandService($pdo);
$brands = $service->list();
$header = new Header('brands');
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Brands</title></head>
<body>
<?php $header->render(); ?>
<h1>Список брендов</h1>
<table><tr><th>ID</th><th>Name</th></tr>
<?php foreach ($brands as $b): ?>
<tr><td><?= htmlspecialchars($b['id']) ?></td><td><?= htmlspecialchars($b['name']) ?></td></tr>
<?php endforeach; ?>
</table>
</body>
</html>

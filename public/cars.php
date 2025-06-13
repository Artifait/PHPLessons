<?php
require __DIR__ . '/../vendor/autoload.php';
use App\View\Header;
use App\Service\CarService;
use App\Service\BrandService;

$pdo = (new App\Database())->getPdo();
$carService = new CarService($pdo);
$brandService = new BrandService($pdo);

// Обработка формы создания
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['model'])) {
    $carService->create(
        $_POST['model'],
        (int)$_POST['brand_id'],
        (int)$_POST['year'],
        (float)$_POST['price'],
        isset($_POST['available'])
    );
    header('Location: cars.php'); exit;
}

require __DIR__ . '/layout.php';
$header = new Header('cars');
echo "<?php $header->render(); ?>";
echo "<main><h1>Автомобили</h1>";
$cars = $carService->list();
echo "<table><tr><th>ID</th><th>Model</th><th>Brand</th><th>Year</th><th>Price</th><th>Available</th><th>Actions</th></tr>";
foreach ($cars as $c) {
    echo "<tr>";
    echo "<td>{$c['id']}</td>";
    echo "<td>{$c['model']}</td>";
    echo "<td>{$c['brand_name']}</td>";
    echo "<td>{$c['year']}</td>";
    echo "<td>{$c['price']}</td>";
    echo "<td>" . (
        $c['available'] ? 'Yes' : 'No'
    ) . "</td>";
    echo "<td><a href='cars.php?edit={$c['id']}'>Edit</a> | <a href='cars.php?delete={$c['id']}'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";
$brands = $brandService->list();
echo "<form method='post'>";
echo "<label>Model<br><input type='text' name='model' required></label>";
echo "<label>Brand<br><select name='brand_id' required>";
foreach ($brands as $b) {
    echo "<option value='{$b['id']}'>{$b['name']}</option>";
}
echo "</select></label>";
echo "<label>Year<br><input type='number' name='year' required></label>";
echo "<label>Price<br><input type='text' name='price' required></label>";
echo "<label>Available<br><input type='checkbox' name='available' checked></label>";
echo "<button type='submit'>Добавить</button>";
echo "</form></main></body></html>";
?>

<?php 
namespace App\Repository;

use App\DTO\SaleDTO;
use PDO;

class SaleRepository {
    private PDO $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function create(SaleDTO $dto): int {
        $sql = "INSERT INTO sales (car_id, client_id, sale_date, sale_price) VALUES (:car_id, :client_id, :sale_date, :sale_price)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':car_id'     => $dto->carId,
            ':client_id'  => $dto->clientId,
            ':sale_date'  => $dto->saleDate,
            ':sale_price' => $dto->salePrice,
        ]);
        return (int)$this->pdo->lastInsertId();
    }
    public function findAll(): array {
        $sql = "SELECT sales.*, clients.full_name AS client_name, cars.model AS car_model FROM sales
JOIN clients ON sales.client_id = clients.id
JOIN cars ON sales.car_id = cars.id";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function findById(int $id): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM sales WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }
    public function update(SaleDTO $dto): bool {
        $sql = "UPDATE sales SET car_id = :car_id, client_id = :client_id, sale_date = :sale_date, sale_price = :sale_price WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':id'         => $dto->id,
            ':car_id'     => $dto->carId,
            ':client_id'  => $dto->clientId,
            ':sale_date'  => $dto->saleDate,
            ':sale_price' => $dto->salePrice,
        ]);
    }
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM sales WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
?>

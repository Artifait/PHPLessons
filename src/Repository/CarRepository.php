<?php
namespace App\Repository;

use App\DTO\CarDTO;
use PDO;

class CarRepository {
    private PDO $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function create(CarDTO $dto): int {
        $sql = "INSERT INTO cars (model, brand_id, year, price, available) VALUES (:model, :brand_id, :year, :price, :available)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':model'     => $dto->model,
            ':brand_id'  => $dto->brandId,
            ':year'      => $dto->year,
            ':price'     => $dto->price,
            ':available' => $dto->available,
        ]);
        return (int)$this->pdo->lastInsertId();
    }
    public function findAll(): array {
        $sql = "SELECT cars.*, brands.name AS brand_name FROM cars JOIN brands ON cars.brand_id = brands.id";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function findById(int $id): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM cars WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }
    public function update(CarDTO $dto): bool {
        $sql = "UPDATE cars SET model = :model, brand_id = :brand_id, year = :year, price = :price, available = :available WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':id'        => $dto->id,
            ':model'     => $dto->model,
            ':brand_id'  => $dto->brandId,
            ':year'      => $dto->year,
            ':price'     => $dto->price,
            ':available' => $dto->available,
        ]);
    }
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM cars WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
?>

<?php
namespace App\Repository;

use App\DTO\BrandDTO;
use PDO;

class BrandRepository {
    private PDO $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function create(BrandDTO $dto): int {
        $sql = "INSERT INTO brands (name) VALUES (:name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':name' => $dto->name]);
        return (int)$this->pdo->lastInsertId();
    }
    public function findAll(): array {
        return $this->pdo->query("SELECT * FROM brands")->fetchAll();
    }
    public function findById(int $id): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM brands WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }
    public function update(BrandDTO $dto): bool {
        $sql = "UPDATE brands SET name = :name WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $dto->id, ':name' => $dto->name]);
    }
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM brands WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
?>

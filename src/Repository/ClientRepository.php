<?php
namespace App\Repository;

use App\DTO\ClientDTO;
use PDO;

class ClientRepository {
    private PDO $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function create(ClientDTO $dto): int {
        $sql = "INSERT INTO clients (full_name, phone, email) VALUES (:full_name, :phone, :email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':full_name' => $dto->fullName,
            ':phone'     => $dto->phone,
            ':email'     => $dto->email,
        ]);
        return (int)$this->pdo->lastInsertId();
    }
    public function findAll(): array {
        return $this->pdo->query("SELECT * FROM clients")->fetchAll();
    }
    public function findById(int $id): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM clients WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }
    public function update(ClientDTO $dto): bool {
        $sql = "UPDATE clients SET full_name = :full_name, phone = :phone, email = :email WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':id'        => $dto->id,
            ':full_name' => $dto->fullName,
            ':phone'     => $dto->phone,
            ':email'     => $dto->email,
        ]);
    }
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM clients WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
?>

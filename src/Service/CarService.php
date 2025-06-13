<?php
namespace App\Service;

use App\DTO\CarDTO;
use App\Repository\CarRepository;
use PDO;

class CarService {
    private CarRepository $repo;
    public function __construct(PDO $pdo) {
        $this->repo = new CarRepository($pdo);
    }
    public function create(string $model, int $brandId, int $year, float $price, bool $available = true): int {
        return $this->repo->create(new CarDTO(null, $model, $brandId, $year, $price, $available));
    }
    public function list(): array {
        return $this->repo->findAll();
    }
    public function get(int $id): ?array {
        return $this->repo->findById($id);
    }
    public function update(int $id, string $model, int $brandId, int $year, float $price, bool $available): bool {
        return $this->repo->update(new CarDTO($id, $model, $brandId, $year, $price, $available));
    }
    public function delete(int $id): bool {
        return $this->repo->delete($id);
    }
}
?>


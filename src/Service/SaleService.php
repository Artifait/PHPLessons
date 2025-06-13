<?php
namespace App\Service;

use App\DTO\SaleDTO;
use App\Repository\SaleRepository;
use PDO;

class SaleService {
    private SaleRepository $repo;
    public function __construct(PDO $pdo) {
        $this->repo = new SaleRepository($pdo);
    }
    public function create(int $carId, int $clientId, string $saleDate, float $salePrice): int {
        return $this->repo->create(new SaleDTO(null, $carId, $clientId, $saleDate, $salePrice));
    }
    public function list(): array {
        return $this->repo->findAll();
    }
    public function get(int $id): ?array {
        return $this->repo->findById($id);
    }
    public function update(int $id, int $carId, int $clientId, string $saleDate, float $salePrice): bool {
        return $this->repo->update(new SaleDTO($id, $carId, $clientId, $saleDate, $salePrice));
    }
    public function delete(int $id): bool {
        return $this->repo->delete($id);
    }
}

?>

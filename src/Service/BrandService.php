<?php
namespace App\Service;

use App\DTO\BrandDTO;
use App\Repository\BrandRepository;
use PDO;

class BrandService {
    private BrandRepository $repo;
    public function __construct(PDO $pdo) {
        $this->repo = new BrandRepository($pdo);
    }
    public function create(string $name): int {
        return $this->repo->create(new BrandDTO(null, $name));
    }
    public function list(): array {
        return $this->repo->findAll();
    }
    public function get(int $id): ?array {
        return $this->repo->findById($id);
    }
    public function update(int $id, string $name): bool {
        return $this->repo->update(new BrandDTO($id, $name));
    }
    public function delete(int $id): bool {
        return $this->repo->delete($id);
    }
}
?>

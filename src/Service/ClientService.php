<?php
namespace App\Service;

use App\DTO\ClientDTO;
use App\Repository\ClientRepository;
use PDO;

class ClientService {
    private ClientRepository $repo;
    public function __construct(PDO $pdo) {
        $this->repo = new ClientRepository($pdo);
    }
    public function create(string $fullName, ?string $phone = null, ?string $email = null): int {
        return $this->repo->create(new ClientDTO(null, $fullName, $phone, $email));
    }
    public function list(): array {
        return $this->repo->findAll();
    }
    public function get(int $id): ?array {
        return $this->repo->findById($id);
    }
    public function update(int $id, string $fullName, ?string $phone = null, ?string $email = null): bool {
        return $this->repo->update(new ClientDTO($id, $fullName, $phone, $email));
    }
    public function delete(int $id): bool {
        return $this->repo->delete($id);
    }
}

?>

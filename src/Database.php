<?php
namespace App;

use PDO;
use PDOException;

class Database {
    private string $host = 'localhost';
    private string $db   = 'autosalon';
    private string $user = 'root';
    private string $pass = '1234';
    private string $charset = 'utf8mb4';
    private ?PDO $pdo = null;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getPdo(): PDO {
        return $this->pdo;
    }
}

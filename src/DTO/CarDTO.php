<?php
namespace App\DTO;

class CarDTO {
    public ?int $id;
    public string $model;
    public int $brandId;
    public int $year;
    public float $price;
    public bool $available;

    public function __construct(
        ?int $id,
        string $model,
        int $brandId,
        int $year,
        float $price,
        bool $available = true
    ) {
        $this->id        = $id;
        $this->model     = $model;
        $this->brandId   = $brandId;
        $this->year      = $year;
        $this->price     = $price;
        $this->available = $available;
    }
}
?>

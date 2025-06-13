<?php
namespace App\DTO;

class SaleDTO {
    public ?int $id;
    public int $carId;
    public int $clientId;
    public string $saleDate;  // 'YYYY-MM-DD'
    public float $salePrice;

    public function __construct(
        ?int $id,
        int $carId,
        int $clientId,
        string $saleDate,
        float $salePrice
    ) {
        $this->id        = $id;
        $this->carId     = $carId;
        $this->clientId  = $clientId;
        $this->saleDate  = $saleDate;
        $this->salePrice = $salePrice;
    }
}
?>

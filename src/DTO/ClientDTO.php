<?php
namespace App\DTO;

class ClientDTO {
    public ?int $id;
    public string $fullName;
    public ?string $phone;
    public ?string $email;

    public function __construct(
        ?int $id,
        string $fullName,
        ?string $phone = null,
        ?string $email = null
    ) {
        $this->id       = $id;
        $this->fullName = $fullName;
        $this->phone    = $phone;
        $this->email    = $email;
    }
}
?>

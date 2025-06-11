<pre>
<?php

class Rabotnik {
    protected string $name;
    protected int $id;

    public function __construct(string $name, int $id) {
        $this->name = $name;
        $this->id = $id;
    }

    public function getInfo(): string {
        return "Работник: {$this->name}, Id: {$this->id}";
    }
}

class Kurier extends Rabotnik {
    private array $orders = [];
    private bool $isAuthorized = false;

    public function SvozitZakaz(string $order): void {
        if (!$this->isAuthorized) {
            echo "Курьер не авторизован, заказ не может быть доставлен\n";
            return;
        }
        echo "Заказ \"$order\" доставлен\n";
        $this->orders[] = $order;
    }

    public function Avtorizovatsya(): void {
        $this->isAuthorized = true;
        echo "Курьер {$this->name} авторизован\n";
    }

    public function PoluchitItogPoZakazam(): void {
        $count = count($this->orders);
        echo "Курьер доставил $count заказ(ов): " . implode(', ', $this->orders) . "\n";
    }

    public function __clone() {
        $this->orders = [];
        $this->isAuthorized = false;
        $this->id += 1000; 
        $this->name .= " (Клон)";
    }
}

$kurier = new Kurier("Иван", 1);
$kurier->Avtorizovatsya();
$kurier->SvozitZakaz("Пицца");
$kurier->SvozitZakaz("Суши");
$kurier->PoluchitItogPoZakazam();

$klon = clone $kurier;
$klon->Avtorizovatsya();
$klon->SvozitZakaz("Бургер");
$klon->PoluchitItogPoZakazam();

?>
</pre>

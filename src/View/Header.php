<?php
namespace App\View;

class Header {
    private array $links;
    private string $current;

    public function __construct(string $currentPage) {
        $this->current = $currentPage;
        $this->links = [
            'home'    => 'index.php',
            'brands'  => 'brands.php',
            'cars'    => 'cars.php',
            'clients' => 'clients.php',
            'sales'   => 'sales.php',
        ];
    }

    public function render(): void {
        echo "<header><nav><ul class='nav-list'>";
        foreach ($this->links as $key => $url) {
            $active = ($key === $this->current) ? ' active' : '';
            $label = ucfirst($key);
            echo "<li class='nav-item{$active}'><a href='{$url}'>{$label}</a></li>";
        }
        echo "</ul></nav></header>";
    }
}
?>

<?php
namespace App\Service;

class StringService
{
    public function capitalizeWords(string $text): string
    {
        return ucwords(strtolower($text));
    }

    public function truncate(string $text, int $maxLength = 100): string
    {
        if (strlen($text) <= $maxLength) {
            return $text;
        }
        return substr($text, 0, $maxLength) . '...';
    }

    public function generateRandomSales(): int
    {
        return random_int(100, 1000);
    }
}

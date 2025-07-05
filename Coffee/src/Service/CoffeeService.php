<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CoffeeService
{
    private const API_URL = 'https://api.sampleapis.com/coffee/hot';

    public function __construct(
        private HttpClientInterface $httpClient,
        private StringService $stringService
    ) {}

    public function getProcessedCoffees(): array
    {
        $response = $this->httpClient->request('GET', self::API_URL);
        $coffees = $response->toArray();

        foreach ($coffees as &$coffee) {
            $coffee['title'] = $this->stringService->capitalizeWords($coffee['title'] ?? '');
            $coffee['description'] = $this->stringService->truncate($coffee['description'] ?? '', 120);
            $coffee['totalSales'] = $this->stringService->generateRandomSales(); 
        }

        return $coffees;
    }
}

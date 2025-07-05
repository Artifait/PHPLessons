<?php
namespace App\Controller;

use App\Service\CoffeeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoffeeController extends AbstractController
{
    #[Route('/', name: 'app_coffee')]
    public function index(CoffeeService $coffeeService): Response
    {
        $coffees = $coffeeService->getProcessedCoffees();

        return $this->render('coffee/index.html.twig', [
            'coffees' => $coffees,
        ]);
    }
}

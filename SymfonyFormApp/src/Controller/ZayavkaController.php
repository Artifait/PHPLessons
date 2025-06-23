<?php

namespace App\Controller;


use App\Entity\Zayavka;
use App\Form\ZayavkaTypeForm;
use App\Repository\ZayavkaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ZayavkaController extends AbstractController
{
    #[Route('/zayavka', name: 'app_zayavka')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $zayavka = new Zayavka();
        $form = $this->createForm(ZayavkaTypeForm::class, $zayavka);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($zayavka);
            $entityManager->flush();

            return $this->redirectToRoute('app_zayavka_success');
        }

        return $this->render('zayavka/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/zayavka/success', name: 'app_zayavka_success')]
    public function success(): Response
    {
        return $this->render('zayavka/success.html.twig');
    }

    #[Route('/secret/zayavki', name: 'zayavka_list')]
    public function list(ZayavkaRepository $zayavkaRepository): Response
    {
        $zayavki = $zayavkaRepository->findAll();

        return $this->render('zayavka/list.html.twig', [
            'zayavki' => $zayavki,
        ]);
    }
}

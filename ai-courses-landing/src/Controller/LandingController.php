<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Application;
use App\Form\ApplicationTypeForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

final class LandingController extends AbstractController
{
    #[Route('/', name: 'app_landing')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $application = new Application();   
        $form = $this->createForm(ApplicationTypeForm::class, $application);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $application->setCreatedAt(new \DateTimeImmutable());
            $em->persist($application);
            $em->flush();
    
            return $this->redirectToRoute('app_thank_you');
        }
    
        return $this->render('landing/index.html.twig', [
          'form' => $form->createView(),
          'scroll_to_form' =>  $form->isSubmitted() && !$form->isValid(),
      ]);
    }

    #[Route('/thank-you', name: 'app_thank_you')]
    public function thankYou(): Response
    {
        return $this->render('landing/thank_you.html.twig');
    }
}

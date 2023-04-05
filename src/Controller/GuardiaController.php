<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/user/guardia'), IsGranted('ROLE_GUARDIA')]
class GuardiaController extends AbstractController
{
    #[Route('/', name: 'app_guardia')]
    public function index(): Response
    {
        return $this->render('guardia/index.html.twig', [
            'controller_name' => 'GuardiaController',
        ]);
    }
}

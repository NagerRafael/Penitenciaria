<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VigilanteController extends AbstractController
{
    #[Route('/vigilante', name: 'app_vigilante')]
    public function index(): Response
    {
        return $this->render('vigilante/index.html.twig', [
            'controller_name' => 'VigilanteController',
        ]);
    }
}

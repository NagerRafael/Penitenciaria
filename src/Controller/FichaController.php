<?php

namespace App\Controller;

use App\Entity\Ficha;
use App\Form\FichaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ficha')]
class FichaController extends AbstractController
{
    #[Route('/', name: 'app_ficha_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $fichas = $entityManager
            ->getRepository(Ficha::class)
            ->findAll();

        return $this->render('ficha/index.html.twig', [
            'fichas' => $fichas,
        ]);
    }

    #[Route('/new', name: 'app_ficha_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ficha = new Ficha();
        $form = $this->createForm(FichaType::class, $ficha);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ficha);
            $entityManager->flush();

            return $this->redirectToRoute('app_ficha_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ficha/new.html.twig', [
            'ficha' => $ficha,
            'form' => $form,
        ]);
    }

    #[Route('/{idFicha}', name: 'app_ficha_show', methods: ['GET'])]
    public function show(Ficha $ficha): Response
    {
        return $this->render('ficha/show.html.twig', [
            'ficha' => $ficha,
        ]);
    }

    #[Route('/{idFicha}/edit', name: 'app_ficha_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ficha $ficha, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FichaType::class, $ficha);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ficha_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ficha/edit.html.twig', [
            'ficha' => $ficha,
            'form' => $form,
        ]);
    }

    #[Route('/{idFicha}', name: 'app_ficha_delete', methods: ['POST'])]
    public function delete(Request $request, Ficha $ficha, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ficha->getIdFicha(), $request->request->get('_token'))) {
            $entityManager->remove($ficha);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ficha_index', [], Response::HTTP_SEE_OTHER);
    }
}

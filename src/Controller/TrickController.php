<?php

namespace App\Controller;

use App\Entity\Picture;
use App\Entity\Trick;
use App\Form\TrickType;
use App\Repository\TrickRepository;
use App\Services\FileUploader;
use App\Services\SlugifyService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    #[Route('/figure', name: 'app_trick')]
    public function showTrick(): Response
    {
        return $this->render('app/pages/tricks/trick.html.twig');
    }
    
    #[Route('/figure/ajouter', name: 'app_add-trick', methods: ['GET', 'POST'])]
    public function createTrick(Request $request, ManagerRegistry $doctrine, TrickRepository $trickRepository, SlugifyService $slugify, FileUploader $fileUploader): Response
    {
        /* Deny access unless authenticated */
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $trick = new Trick();
        $trickForm = $this->createForm(TrickType::class, $trick);
        $trickForm->handleRequest($request);

        if ($trickForm->isSubmitted() && $trickForm->isValid()) {
            $entityManager = $doctrine->getManager();
            $trickRepository->add($trick);
            $trick = $trickForm->getData();
            
            /* Slugify from trick title */
            $slug = $slugify->slugify($trick->getTitle());
            $trick->setSlug($slug);

            $pictures = $trickForm->get('pictures');

            foreach ($pictures as $picture) {
                // $newPicture = new Picture();
                $newPicture = $picture->getData();
                $filePath = $fileUploader->upload($picture->get('path')->getData());
                $newPicture->setPath($filePath);

                $picture->getData()->setTrick($trick);
                $trick->addPicture($picture->getData());
            }

            $entityManager->persist($trick);
            $entityManager->flush();

            $this->addFlash('success', 'La figure '.$trick->getTitle().' a bien été créée !');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('admin/pages/tricks/new.html.twig', [
            'addTrickForm' => $trickForm->createView()
        ]);
    }
}
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{

    public function __construct()
    {
    }

    #[Route('/figures', name: 'app_trick')]
    public function showTrick(): Response
    {
        return $this->render('app/pages/tricks/trick.html.twig');
    }

    /**
     * 
     */
    // #[Route('/figure/ajouter', name: 'app_trick_add', methods: ['GET', 'POST'])]
    // public function createTrick(Request $request, ManagerRegistry $doctrine, TrickRepository $trickRepository, SlugifyService $slugify, FileUploader $fileUploader): Response
    // {
    //     /* Deny access unless authenticated */
    //     $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

    //     $trick = new Trick();
    //     $trickForm = $this->createForm(TrickType::class, $trick);
    //     $trickForm->handleRequest($request);

    //     if ($trickForm->isSubmitted() && $trickForm->isValid()) {
    //         $entityManager = $doctrine->getManager();
    //         $trickRepository->add($trick);
    //         $trick = $trickForm->getData();
            
    //         /* Slugify from trick title */
    //         $slug = $slugify->slugify($trick->getTitle());
    //         $trick->setSlug($slug);

    //         $pictures = $trickForm->get('pictures');

    //         foreach ($pictures as $picture) {
    //             // $newPicture = new Picture();
    //             $newPicture = $picture->getData();
    //             $filePath = $fileUploader->upload($picture->get('path')->getData());
    //             $newPicture->setPath($filePath);

    //             $picture->getData()->setTrick($trick);
    //             $trick->addPicture($picture->getData());
    //         }

    //         $entityManager->persist($trick);
    //         $entityManager->flush();

    //         $this->alertService->success(sprintf('La figure %s a bien été créée !', $trick->getTitle()));

    //         return $this->redirectToRoute('app_home');
    //     }

    //     return $this->render('admin/pages/tricks/new.html.twig', [
    //         'addTrickForm' => $trickForm->createView(),
    //     ]);
    // }

    // #[Route('/figure/{slug}/editer', name: 'app_trick_edit', methods: ['GET', 'POST'])]
    // public function editTrick(Request $request, ManagerRegistry $doctrine, TrickRepository $trickRepository, SlugifyService $slugify, FileUploader $fileUploader): Response
    // {
    //     /* Deny access unless authenticated */
    //     $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

    //     $trick = new Trick();
    //     $trickForm = $this->createForm(TrickType::class, $trick);
    //     $trickForm->handleRequest($request);

    //     if ($trickForm->isSubmitted() && $trickForm->isValid()) {
    //         $entityManager = $doctrine->getManager();
    //         $trickRepository->add($trick);
    //         $trick = $trickForm->getData();
            
    //         /* Slugify from trick title */
    //         $slug = $slugify->slugify($trick->getTitle());
    //         $trick->setSlug($slug);

    //         $pictures = $trickForm->get('pictures');

    //         foreach ($pictures as $picture) {

    //             if ($picture->get('path')->getData()!==null) {
    //                 $newPicture = $picture->getData();
    //                 $filePath = $fileUploader->upload($picture->get('path')->getData());
    //                 $newPicture->setPath($filePath);

    //                 $picture->getData()->setTrick($trick);
    //                 $trick->addPicture($picture->getData());
    //             }
    //         }

    //         $entityManager->persist($trick);
    //         $entityManager->flush();

    //         $this->alertService->success(sprintf('La figure %s a bien été mise à jour !', $trick->getTitle()));

    //         return $this->redirectToRoute('app_home');
    //     }

    //     return $this->render('admin/pages/tricks/new.html.twig', [
    //         'addTrickForm' => $trickForm->createView(),
    //     ]);
    // }
}
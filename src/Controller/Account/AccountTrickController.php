<?php

declare(strict_types=1);

namespace App\Controller\Account;

use App\Entity\Trick;
use App\Form\TrickType;
use App\Repository\TrickRepository;
use App\Services\FileUploader;
use App\Services\SlugifyService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/compte/figure', name: 'account_tricks_')]
class AccountTrickController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em,
        private TrickRepository $trickRepository,
        private SlugifyService $slugify,
        private FileUploader $fileUploader
    )
    {
        $this->em = $em;
        $this->trickRepository = $trickRepository;
        $this->slugify = $slugify;
        $this->fileUploader = $fileUploader;
    }

    #[Route('/ajouter', name: 'add', methods: ['GET', 'POST'])]
    public function createTrick(Request $request): Response
    {
        $trick = new Trick();
        $trickForm = $this
            ->createForm(TrickType::class, $trick)
            ->handleRequest($request)
        ;

        if ($trickForm->isSubmitted() && $trickForm->isValid()) {
            /* Slugify from trick title */
            $trick->setSlug((string) $this->slugify->slugify($trick->getTitle()));

            $trick = $this->managePicture($trickForm->get('pictures'), $trick);

            $this->em->persist($trick);
            $this->em->flush();

            $this->addFlash('success', sprintf('La figure %s a bien été créée !', $trick->getTitle()));

            return $this->redirectToRoute('app_home');
        }

        return $this->render('admin/pages/tricks/new.html.twig', [
            'addTrickForm' => $trickForm->createView(),
        ]);
    }

    #[Route('/{slug}/editer', name: 'edit', methods: ['GET', 'POST'])]
    public function editTrick(Trick $trick, Request $request): Response
    {
        $trick->$this->managePicture($trick->getPictures(), $trick);
    
        $editTrickForm = $this
            ->createForm(TrickType::class, $trick)
            ->handleRequest($request)
        ;

        if ($editTrickForm->isSubmitted() && $editTrickForm->isValid()) {
            /* Slugify from trick title */
            $trick->setSlug((string) $this->slugify->slugify($trick->getTitle()));

            $trick = $this->managePicture($editTrickForm->get('pictures'), $trick);

            $this->em->persist($trick);
            $this->em->flush();

            $this->addFlash(
                'success',
                sprintf('La figure %s a bien été modifiée !', $trick->getTitle())
            );

            return $this->redirectToRoute('app_home');
        }

        return $this->render('admin/pages/tricks/edit.html.twig', [
            'addTrickForm' => $editTrickForm,
        ]);
    }

    #[Route('/{slug}', name: 'delete', methods: ['POST'])]
    public function deleteTrick(Request $request, Trick $trick): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trick->getId(), $request->request->get('_token'))) {
            $this->em->remove($trick);
            $this->em->flush();

            $this->addFlash(
                'success',
                sprintf('La figure %s a bien été supprimée !', $trick->getTitle())
            );
        }

        return $this->redirectToRoute('app_home');
    }

    private function managePicture($pictures, Trick $trick): Trick
    {
        foreach ($pictures as $picture) {

            if ($picture->get('path')->getData()!==null) {
                $newPicture = $picture->getData();
                $filePath = $this->fileUploader->upload($picture->get('path')->getData());
                $newPicture->setPath($filePath);

                $picture->getData()->setTrick($trick);
                $trick->addPicture($picture->getData());
            }
        }

        return $trick;
    }
}
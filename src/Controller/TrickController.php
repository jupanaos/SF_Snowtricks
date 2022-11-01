<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/figure', name: 'app_tricks_')]
class TrickController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/liste', name: 'list')]
    public function showTrickList(): Response
    {
        return $this->render('app/pages/tricks/index.html.twig');
    }

    #[Route('/{slug}', name: 'item')]
    public function showTrick(Trick $trick, Request $request): Response
    {
        /* Create the comment form */
        $comment = new Comment();
        $commentForm = $this->createForm(CommentType::class, $comment);

        $commentForm ->handleRequest($request);

        /* If the comment form is validated */
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $comment->setAuthor($this->getUser());
            $comment->setTrick($trick);

            $this->em->persist($comment);
            $this->em->flush();

             /* Comment has been added, success message and redirection to the trick */
            $this->addFlash('success', 'Votre commentaire a bien été ajouté !');
            return $this->redirectToRoute('app_tricks_item', [
                'slug' => $trick->getSlug()
            ]);
        }

        $comments = $this->em
            ->getRepository(Comment::class)
            ->findBy(
                [
                    'trick' => $trick->getId(),
                ],
                [
                    'created_at' => 'DESC',
                ],
                10
            );

        return $this->render('app/pages/tricks/trick.html.twig', [
            'trick' => $trick,
            'comments' => $comments,
            'commentForm' => $commentForm->createView()
        ]);
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
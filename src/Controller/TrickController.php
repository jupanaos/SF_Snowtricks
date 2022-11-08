<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
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
        $tricks = $this->em
        ->getRepository(Trick::class)
        ->findAll();

        return $this->render('app/pages/tricks/index.html.twig', [
            'tricks' => $tricks,
        ]);
    }

    #[Route('/{slug}', name: 'item')]
    public function showTrick(Trick $trick, Request $request, PaginatorInterface $paginator): Response
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
            );

        $comments = $paginator->paginate(
            $comments,
            $request->query->getInt(key:'page', default:1), limit: 3
        );

        return $this->render('app/pages/tricks/trick.html.twig', [
            'trick' => $trick,
            'comments' => $comments,
            'commentForm' => $commentForm->createView()
        ]);
    }
}
<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Form\TrickType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/utilisateur', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('app/pages/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    // #[Route('/utilisateur/figure/ajouter', name: 'app_add-trick', methods: ['GET', 'POST'])]
    // public function createTrick(): Response
    // {
    //     $trick = new Trick();
    //     $form = $this->createForm(TrickType::class, $trick);

    //     return $this->render('admin/pages/tricks/new.html.twig', [
    //         'addTrickForm' => $form->createView()
    //     ]);
    // }
}
// class UserController extends AbstractController
// {
//     #[Route('/register', name: 'register')]
//     public function showRegister(): Response
//     {
//         return $this->render('app/pages/login/register.html.twig');
//     }
// }
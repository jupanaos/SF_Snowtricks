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
}
// class UserController extends AbstractController
// {
//     #[Route('/register', name: 'register')]
//     public function showRegister(): Response
//     {
//         return $this->render('app/pages/login/register.html.twig');
//     }
// }
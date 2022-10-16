<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function showRegister(): Response
    {
        return $this->render('app/pages/login/register.html.twig');
    }
}
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function showHome(): Response
    {
        return $this->render('app/pages/home/index.html.twig');
    }
}
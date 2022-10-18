<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    #[Route('/figure', name: 'app_trick')]
    public function showTrick(): Response
    {
        return $this->render('app/pages/tricks/trick.html.twig');
    }
}
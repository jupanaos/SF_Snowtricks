<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TrickController extends AbstractController
{
    #[Route('/trick', name: 'trick')]
    public function showTrick(): Response
    {
        return $this->render('app/pages/tricks/trick.html.twig');
    }
}
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    #Route('/', name: 'index')
    public function showIndex(): Response
    {
        return $this->render('client/index.html.twig');
    }
}
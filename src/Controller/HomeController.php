<?php

namespace App\Controller;

use App\Entity\Trick;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function showHome(EntityManagerInterface $em): Response
    {
        $tricks = $em
        ->getRepository(Trick::class)
        ->findAll();
        
        return $this->render('app/pages/home/index.html.twig', [
            'tricks' => $tricks,
        ]);
    }
}
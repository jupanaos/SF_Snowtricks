<?php

namespace App\Controller;

use App\Entity\Trick;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function showHome(EntityManagerInterface $em, Request $request, PaginatorInterface $paginator): Response
    {
        $tricks = $em
        ->getRepository(Trick::class)
        ->findAll();

        $tricks = $paginator->paginate(
            $tricks,
            $request->query->getInt(key:'page', default:1), limit: 6
        );
        
        return $this->render('app/pages/home/index.html.twig', [
            'tricks' => $tricks,
        ]);

        // $offset = max(0, $request->query->getInt('offset', 0));
        // $paginator = $trickRepository->getTrickPaginator($offset);

        // return $this->render('app/pages/home/index.html.twig', [
        //     'tricks' => $paginator,
        //     'previous' => $offset - TrickRepository::PAGINATOR_PER_PAGE,
        //     'next' => min(count($paginator), $offset + TrickRepository::PAGINATOR_PER_PAGE),
        // ]);
    }
}
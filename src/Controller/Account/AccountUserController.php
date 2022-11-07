<?php

namespace App\Controller\Account;

use App\Entity\Trick;
use App\Entity\User;
use App\Form\TrickType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/compte', name: 'account_user_')]
class AccountUserController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em,
        private UserRepository $userRepository,)
    {
        $this->em = $em;
        $this->userRepository = $userRepository;
    }
    
    #[Route('/{username}', name: 'dashboard', methods:['GET'])]
    public function showUserDashboard(User $user): Response
    {
        $user = $this->getUser();

        return $this->render('account/pages/home/index.html.twig', [
            'user' => $user,
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
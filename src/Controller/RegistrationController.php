<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;


use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use Psr\Log\LoggerInterface;

use Doctrine\ORM\EntityManagerInterface;

class RegistrationController extends AbstractController // implements PasswordUpgraderInterface
{
    public function index(UserPasswordHasherInterface $passwordHasher): Response
    {
        // ... e.g. get the user data from a registration form
        /*$user = new User(...);
        $plaintextPassword = ...;*/

        // hash the password (based on the security.yaml config for the $user class)
/*$hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
*/
        // ...
    }
    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)  {
		$this->entityManager = $entityManager;
		$this->logger = $logger;
        
	}
    
    #[Route('/Login', name: 'Register')]
    public function login(Request $request): Response
    {   
    return $this->render('login.html.twig', [
        'controller_name' => 'RegistrationController',
    ]);
    }
}
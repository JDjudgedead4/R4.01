<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Psr\Log\LoggerInterface;

use Doctrine\ORM\EntityManagerInterface;



class LoginController extends AbstractController
{
    private EntityManagerInterface $entityManager;
	private LoggerInterface $logger; 
    private $authenticationUtils;
    private $tokenStorage;
	
	public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)  {
		$this->entityManager = $entityManager;
		$this->logger = $logger;
        $tokenStorage = $this->container->get('security.token_storage');
	}
    
    #[Route('/login', name: 'login')]
    public function login(Request $request): Response
    {
        if ($this->tokenStorage->getToken() && $this->tokenStorage->getToken() !== null) {
            $user = $this->tokenStorage->getToken()->getUser();
            if ($user instanceof User) {
                return $this->redirectToRoute('homepage');
            }
        }
    
    
    $error = $this->authenticationUtils->getLastAuthenticationError();

    $loginForm = $this->createForm(LoginFormType::class); 

    
    if ($request->isMethod('POST')) {
        $loginForm->handleRequest($request);

        if ($loginForm->isValid()) {
           
            $username = $loginForm->get('username')->getData();
            $password = $loginForm->get('password')->getData();

            // Attempt authentication using the framework's built-in mechanisms
            try {
                $this->get('security.authentication.manager')->authenticateUser(
                    new \Symfony\Component\Security\Core\Security\Token\UsernamePasswordToken(
                        $username,
                        $password,
                    )
                );

                $this->addFlash('success', 'Login successful!');  // Display success message

                
                return $this->redirectToRoute('accederAuPanier'); // Replace with your desired target route
            } catch (AuthenticationException $e) {
                // Handle authentication failure
                $this->addFlash('error', 'Invalid username or password.'); // Display error message
            }
        }
    }

    // Render the login form template
    return $this->render('login.html.twig', [
        'error' => $error,  // Pass error message to the template
        'loginForm' => $loginForm->createView(),
    ]);

}
}

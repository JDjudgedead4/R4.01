<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Psr\Log\LoggerInterface;

use Doctrine\ORM\EntityManagerInterface;



class CGUController extends AbstractController
{
    private EntityManagerInterface $entityManager;
	private LoggerInterface $logger; 
    private $authenticationUtils;
    private $tokenStorage;
	
	public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)  {
		$this->entityManager = $entityManager;
		$this->logger = $logger;
        
	}
    
    #[Route('/CGU', name: 'CGU')]
    public function CGU(Request $request): Response    {  
    return $this->render('CGU.html.twig', [
    ]);
    }
    #[Route('/CGV', name: 'CGV')]
    public function CGV(Request $request): Response    {  
    return $this->render('CGV.html.twig', [
    ]);
    }
}

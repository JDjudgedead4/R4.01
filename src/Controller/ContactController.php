<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Psr\Log\LoggerInterface;

use Doctrine\ORM\EntityManagerInterface;



class ContactController extends AbstractController
{
    private EntityManagerInterface $entityManager;
	private LoggerInterface $logger; 
    
	
	public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)  {
		$this->entityManager = $entityManager;
		$this->logger = $logger;
        
	}
    
    #[Route('/Contact', name: 'Contact')]
    public function contact(Request $request): Response
    {
    return $this->render('contact.html.twig', [
    ]);
    }
}

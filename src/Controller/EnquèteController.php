<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PeriodesRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Periodes;


class EnquèteController extends AbstractController{
   /**
    *@Route("/enquetes", name="enquetes.index")
    *@return Response
    */
    public function index(PeriodesRepository $repository):Response
    {
        $periodes = $repository->findAll();
        return $this->render('pages/enquetes.html.twig', [
            'periodes' => $periodes
        ]);
    }
    
}
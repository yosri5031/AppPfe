<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StudentsRepository;
use App\Repository\MatiereRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Students;
use phpDocumentor\Reflection\Types\Integer;

class EnquèteController extends AbstractController{
   /**
    *@Route("/enquetes", name="enquetes.index")
    *@return Response
    */
    public function index(StudentsRepository $repository):Response
    {
        $students = $repository->findAll();
        
        return $this->render('pages/enquetes.html.twig', [
            'students' => $students,
            
        ]);
    }
    /**
    *@Route("/enquetes-LBC1", name="enquetes.lbc1")
    *@return Response
    */
    
    public function findM(MatiereRepository $repository):Response
    {
        $matiere = $repository->findByLBC1();
        return $this->render('pages/lbc1.html.twig', [
            
            'matieres' => $matiere
        ]);
    }
    
}
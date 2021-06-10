<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StudentsRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Students;


class EnquèteController extends AbstractController{
   /**
    *@Route("/enquetes", name="enquetes.index")
    *@return Response
    */
    public function index(StudentsRepository $repository):Response
    {
        $students = $repository->findAll();
        return $this->render('pages/enquetes.html.twig', [
            'students' => $students
        ]);
    }
    
}
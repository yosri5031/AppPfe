<?php 
namespace App\Controller;

use App\Entity\Classe;
use App\Entity\Matiere;
use App\Entity\Students;
use App\Repository\ClasseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StudentsRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

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

    public function showSomeMatiere(ClasseRepository $repository, Request $request):Response
     {

      $em = $this->getDoctrine()->getManager();
      $id = $request->get('studientId');
      $studient = $em->getRepository(Students::class)->find($id);
      if($id == "" or !$studient){

          $flashBag = $this->get('session')->getFlashBag();
          $flashBag->get('error'); // gets message and clears type
          $flashBag->set('error', 'Id incorrecte !!');

         return $this->redirectToRoute('enquetes.index');
      }
      $classe = $em->getRepository(Classe::class)->find($studient->getClasse()->getId()); //$studient->getClasse();
      $matiers = $em->getRepository(Matiere::class)->findBy(['classe'=>$classe->getId()]); //$studient->getClasse();


     return $this->render('pages/lbc1.html.twig', [
     'classe'=>$classe,
     'matieres' => $matiers,
         'studient'=>$studient
      ]);
     }
}

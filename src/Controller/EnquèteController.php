<?php 
namespace App\Controller;

use App\Entity\Classe;
use App\Entity\Matiere;
use App\Entity\Periodes;
use App\Entity\Students;
use App\Entity\User;
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
    *@Route("/liste-qcm/{id}", name="qcm.list")
    
    *@return Response
    */

    public function showSomeMatiere(ClasseRepository $repository, Request $request,$id):Response
     {

      $em = $this->getDoctrine()->getManager();
//      $id = $request->get('studientId');
      $final=[];

      if($id == "" or $id == null){
          $flashBag = $this->get('session')->getFlashBag();
          $flashBag->get('error'); // gets message and clears type
          $flashBag->set('error', 'Id incorrecte !!');

         return $this->redirectToRoute('enquetes.index');
      }
         $studient = $em->getRepository(User::class)->find($id);
         if(!$studient){
             $flashBag = $this->get('session')->getFlashBag();
             $flashBag->get('error'); // gets message and clears type
             $flashBag->set('error', 'Id incorrecte !!');

             return $this->redirectToRoute('enquetes.index');
         }
      $classe = $em->getRepository(Classe::class)->find($studient->getClasse()->getId()); //$studient->getClasse();
      $matiers = $em->getRepository(Matiere::class)->findBy(['classe'=>$classe->getId()]); //$studient->getClasse();
         foreach ($matiers as $matier){
             if($matier->getSemestre()->getCourante() == 1){
                 $final[$matier->getSemestre()->getSemestre()][]=$matier;
             }
         }


     return $this->render('pages/qcmlist.html.twig', [
     'classe'=>$classe,
     'matieres' => $final,
         'studient'=>$studient,
      ]);
     }
}

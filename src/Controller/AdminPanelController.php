<?php 
namespace App\Controller;
use App\Entity\Matiere;
use App\Entity\Questionnaire;
use App\Entity\studentqcm;
use App\Entity\Students;
use App\Entity\EnseignantMatiere;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


use Symfony\Component\Routing\Annotation\Route;


class AdminPanelController extends AbstractController{
    /**
     * @Route("/panel/{id}", name="adminpanel")
     * @return Response
     */
    public function index($id):Response
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        $matiere = $em->getRepository(Matiere::class)->findBy(['user'=>$user->getId()]);

        foreach ($matiere as $matiers){
            $mtr = $em->getRepository(EnseignantMatiere::class)->findBy(['user'=>$user->getId(),'matiere'=>$matiers->getId()]);
            if(!$mtr){
                $ensmat = new EnseignantMatiere();
                $ensmat->setUser($user);
                $ensmat->setMatiere($matiers);


                $em->persist($ensmat);
            }
            $em->flush();
        }


        return $this->render('pages/AdminPanel.html.twig', ['id'=>$user,'matiers'=>$matiere]);
    }

/**
     * @Route("/view", name="view")
     * @return Response
     */
    public function viewAnalyse($id,$idstudent)
    {
        $em = $this->getDoctrine()->getManager();
        $questions = $em->getRepository(Questionnaire::class)->findAll();
        $studient = $em->getRepository(Students::class)->find($idstudent);
        $matiere = $em->getRepository(Matiere::class)->find($id);



    }
      }
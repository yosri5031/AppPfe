<?php 
namespace App\Controller;
use App\Entity\Classe;
use App\Entity\Department;
use App\Entity\Matiere;

use App\Entity\EnseignantMatiere;

use App\Entity\Periodes;
use App\Entity\Questionnaire;
use App\Entity\studentqcm;
use App\Entity\Students;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


use Symfony\Component\Routing\Annotation\Route;


class AdminPanelController extends AbstractController{
    /**
     * @Route("/panel/{id}/{semestre}", name="adminpanel")
     * @return Response
     */
    public function index($id,$semestre):Response
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        $department = $em->getRepository(Department::class)->find($id);$matiere=[];

//        $username = $em->getRepository(User::class)->findBy(['username' => $user->getUsername()]);

//        if ($user->getUsername() > 0) {
//
//            $this->redirectToRoute('enquetes.index');
//        }

        // id  enseignant toujours inferieur a 100 et id chef de département toujours > 100 avec id chef= id departement
        if ($user->getId() < 100) {
            $matiere = $em->getRepository(Matiere::class)->findBy(['user' => $user->getId(),'semestre'=>$semestre]);
        }
        else {
            $classe = $em->getRepository(Classe::class)->findBy(['department' => $department->getId()]);
            foreach ($classe as $item){
                $matiere= array_merge($em->getRepository(Matiere::class)->findBy(['classe' => $item->getId()]),$matiere);
            }

        }
        return $this->render('pages/AdminPanel.html.twig', ['department' => $department,'id'=>$user,'matiers'=>$matiere]);
    }

    /**
     * @Route("/calendrier", name="calendrier")
     * @return Response
     */
    public function calendrier(): Response
    {

        return $this->render('pages/Calendrier.html.twig');
    }

    /**
     * @Route("/anneescolaire/{id}", name="annee_scolaire")
     * @return Response
     */
    public function anneescolaire($id): Response
    {

        $em = $this->getDoctrine()->getManager();$final=[];
        $user = $em->getRepository(User::class)->find($id);
        $annes = $em->getRepository(Periodes::class)->findAll();

        foreach ($annes as $anne){
            $final[$anne->getAnnee()][]=$anne;
        }
        return $this->render('pages/annescolaire.html.twig',['annees'=> $final,'id'=>$id]);
    }
     /**
     * @Route("/view/{id}", name="view")
     * @return Response
     */
    public function analyseqcm(Request $request,$id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $matiere = $em->getRepository(Matiere::class)->find($id);
        $notes = $em->getRepository(studentqcm::class)->findBy(['matiere' => $id]);
        $questionss = $em->getRepository(Questionnaire::class)->findAll();
        $nbr_eleves =count( $em->getRepository(User::class)->findBy(['classe' => $matiere->getClasse()]));
        $classe = $matiere->getClasse();
        $semestre=$matiere->getSemestre();
        $questions=[];$final=[];$qes=[];

        foreach ($notes as $note){
            if(key_exists($note->getQuestion()->getId(),$questions)){
                $questions[$note->getQuestion()->getId()]=  $questions[$note->getQuestion()->getId()] + $note->getNote() ;
            }else{
                $questions[$note->getQuestion()->getId()]=$note->getNote() ;
            }
        }
        foreach ($questionss as $key=>$val){
            $qes[$val->getSujet()][]= $val;
        }
        foreach ($questions as $key=>$val){
            $final[$key]= $val/$nbr_eleves;
        }

//        dump($qes,$final,$nbr_eleves,$questions);die();
        return $this->render('pages/statistiqueprof.html.twig',
            ["classe"=>$classe,"periode"=>$semestre,"matiere"=>$matiere,'questions'=> $qes,'nombre_reponses'=>$nbr_eleves,'result'=>$final]);
    }
}
























































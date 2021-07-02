<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Entity\Questionnaire;
use App\Entity\studentqcm;
use App\Entity\Students;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QCMController extends AbstractController
{
    /**
     * @Route("/qcm/{id}/{idstudent}", name="qcm")
     * @return Response
     */
    public function index($id,$idstudent): Response
    {
        $em = $this->getDoctrine()->getManager();
        $questions = $em->getRepository(Questionnaire::class)->findAll();
        $studient = $em->getRepository(Students::class)->find($idstudent);
        $matiere = $em->getRepository(Matiere::class)->find($id);


        foreach ($questions as $question){
            $qcm = $em->getRepository(studentqcm::class)->findBy(['matiere'=>$matiere->getId(),'student'=>$studient->getId(),'question'=>$question->getId()]);
          if(!$qcm){
              $qcmstudient = new studentqcm();
              $qcmstudient->setMatiere($matiere);
              $qcmstudient->setStudent($studient);
              $qcmstudient->setQuestion($question);
              $em->persist($qcmstudient);
          }
           $em->flush();
        }

        $qcms = $em->getRepository(studentqcm::class)->findBy(['matiere'=>$matiere->getId(),'student'=>$studient->getId()]);
        $final=[];
        foreach ($qcms as $qcm){
            $sujet=$qcm->getQuestion()->getSujet();
                $final[$sujet][]= $qcm;
        }
        return $this->render('pages/qcm.html.twig',['qcms'=>$final,'id'=>$matiere->getId(),'stu'=>$studient->getId()]);
//        $qb = $this->getDoctrine()->getManager();
//        $query = $qb->createQueryBuilder('q')
//            ->select('qs.sujet as sujet')
//            ->addselect('q')
//            ->from('App:studentqcm','q')
//            ->join('q.question','qs')
//            ->Where('q.matiere = :m and q.student = :s')
//            ->setParameter('m', $matiere->getId())
//            ->setParameter('s', $studient->getId())
//            ->groupBy('qs.sujet')
//            ->getQuery()
//            ->getResult()
//        ;

    }


    /**
     * @Route("/saveqcm/{id}/{stu}", name="save_qcm")
     * @return Response
     */
    public function saveqcm(Request $request,$id,$stu): Response
    {
        $em = $this->getDoctrine()->getManager();
        $data = $request->request->all();
        if($data){
            foreach ($data as $k=>$v){
                $id_question = substr($k, 0, -3);
                $qcm = $em->getRepository(studentqcm::class)->findOneBy(['matiere'=>$id,'student'=>$stu,'question'=>$id_question]);
                // i need solution for analyse + departement + periode
                $qcm->setNote($v[0]);
                $em->persist($qcm);
                $em->flush();
            }
        }
       return  $this->redirectToRoute('qcm',['id'=>$id,'idstudent'=>$stu]);
    }
}

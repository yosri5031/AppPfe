<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
//        if ($this->isGranted('ROLE_ADMIN')) {
//            return $this->redirect($this->generateUrl('annee_scolaire', ['id'=>$this->getUser()->getId()]));}
//        else{
//            return $this->redirect($this->generateUrl('qcm.list', ['id'=>$this->getUser()->getId()]));
//        }


//         if ($this->getUser()) {
////             dump($this->getUser()->getClasse());die();
//
//        return $this->redirectToRoute('qcm.list', ['id'=>$this->getUser()->getId()]);
////        return $this->redirectToRoute('annee_scolaire', ['id'=>$this->getUser()->getId()]);
////        return $this->redirectToRoute('adminpanel', ['id'=>$this->getUser()->getId()]);
//         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        if(TRUE === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('annee_scolaire', ['id'=>$this->getUser()->getId()]);
        }
        if(TRUE === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('qcm.list', ['id'=>$this->getUser()->getId()]);
        }


        return $this->render('pages/admin.html.twig', ['last_username' => $lastUsername, 'error' => $error]);

    }

//    public function AdminAction()
//    {
//        if(FALSE === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
//            return $this->redirectToRoute('annee_scolaire', ['id'=>$this->getUser()->getId()]);
//        }
//        else{
//            return $this->render('pages/admin.html.twig');
//        }
//    }
//    public function UserAction()
//    {
//        if(FALSE === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
//            return $this->redirectToRoute('qcm.list', ['id'=>$this->getUser()->getId()]);
//        }
//        else{
//            return $this->render('pages/admin.html.twig');
//        }
//    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}

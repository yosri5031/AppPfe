<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;


class AdminPanelController extends AbstractController{
   /**
    *@Route("/apropos", name="adminpanel")
    *@return Response
    */
    public function index():Response
    {
        return $this->render('pages/AdminPanel.html.twig');
    }
}
<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;


class liensController extends AbstractController{
   /**
    *@Route("/liens", name="liens.index")
    *@return Response
    */
    public function index():Response
    {
        return $this->render('pages/liens.html.twig');
    }
}
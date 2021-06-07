<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;


class aproposController extends AbstractController{
   /**
    *@Route("/apropos", name="apropos.index")
    *@return Response
    */
    public function index():Response
    {
        return $this->render('pages/apropos.html.twig');
    }
}
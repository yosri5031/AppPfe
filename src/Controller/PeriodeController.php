<?php

namespace App\Controller;
use App\Entity\Periodes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PeriodeController extends AbstractController
{
    /**
     * @Route("/periodes", name="periodes")
     */
    public function index(): Response
    {
        $periodes = $this->getDoctrine()->getRepository(Periodes::class)->findAll();
        return $this->render('periode/index.html.twig', [
            'periodes' => $periodes
        ]);
    }
}

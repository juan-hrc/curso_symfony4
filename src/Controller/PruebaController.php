<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//agregarlo para poder obtener el request
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Prueba;

//comando para generar controlador y twig -> php bin/console make:controller NOMBRE

//comando para ver los ruteos -> php bin/console debug:router

  /**
    * @Route("/prueba", name="prueba")
    */

class PruebaController extends AbstractController
{
  /**
     * @Route("/", name="inicio")
     */
    public function index()
    {
        return $this->render('prueba/index.html.twig', [
            'controller_name' => 'PruebaController', 'param' => 5
        ]);
    }

}

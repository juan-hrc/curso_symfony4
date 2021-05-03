<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//agregarlo para poder obtener el request
use Symfony\Component\HttpFoundation\Request;

//
use App\Entity\Product;

//comando para generar controlador y twig
//php bin/console make:controller NOMBRE

//comando muy bueno para ver los ruteos -> php bin/console debug:router

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

    /**
     * @Route("/nada", name="nada")
     */
    public function nada(Request $request)
    {

        $user =$request->request->get("user");
        $pass =$request->request->get("pass");

        if($user == "hola")
            $msj = "COOOOORREC TA!";
        else
        $msj = "so bad";

        $em = $this->getDoctrine()->getManager();
        $msj = $em->getRepository('App\Entity\Prueba')->consulta($user,$pass);


        return $this->render('prueba/result.html.twig', [
            'controller_name' => 'PruebaController', 'msj' => $msj
            ]);
    }
}

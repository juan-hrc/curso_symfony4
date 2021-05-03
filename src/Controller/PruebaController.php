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


        //$em = $this->getDoctrine()->getManager();
        //$msj = $em->getRepository('App\Entity\Prueba')->control($user);

        $repository = $this->getDoctrine()->getRepository('App\Entity\Prueba');

        // or find by name and price
        $usuario = $repository->findOneBy([
            'nombre' => $user,
            'clave' => $pass,
        ]);

        if($usuario <> null)
            $msj = 'Acceso correcto';
        else
            $msj = 'usuario o contraseña incorrectos';

        return $this->render('prueba/result.html.twig', [
            'controller_name' => 'PruebaController', 'msj' => $msj
            ]);
    }

        /**
     * @Route("/nada2", name="nada2")
     */
    public function nada2(Request $request)
    {

        $user =$request->request->get("user");
        $pass =$request->request->get("pass");

        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('App\Entity\Prueba')->consulta($user,$pass);

        if(count($usuario) <> 0)
            $msj = 'Acceso correcto';
        else
            $msj = 'usuario o contraseña incorrectos';

        return $this->render('prueba/result.html.twig', [
            'controller_name' => 'PruebaController', 'msj' => $msj
            ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;  //agregarlo para poder obtener el request
use App\Entity\Prueba;


/**
 * @Route("/login", name="login")
 */

class LoginController extends AbstractController
{
    /**
     * @Route("/", name="inicio")
     */
    public function index()
    {
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'msj' => ''
        ]);
    }


    /**
     * @Route("/verificar", name="verificar")
     */
    public function verificar(Request $request)
    {

        $user =$request->request->get("user");
        $pass =$request->request->get("pass");


        $repository = $this->getDoctrine()->getRepository(Prueba::class);

        $usuario = $repository->findOneBy([
            'nombre' => $user,
            'clave' => $pass,
        ]);

        if($usuario <> null){
            $msj = 'Acceso correcto';
            $vista = 'prueba/result.html.twig';
        }
        else{
            $msj = 'usuario o contraseña incorrectos';
            $vista = 'login/index.html.twig';
        }

        return $this->render($vista, [
            'controller_name' => 'PruebaController', 'msj' => $msj
            ]);
    }


    /**
     * @Route("/verificar_2", name="verificar_2")
     */
    public function verificar_2(Request $request)
    {

        $user =$request->request->get("user");
        $pass =$request->request->get("pass");

        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository(Prueba::class)->consulta($user,$pass);

        if($usuario <> null){
            $msj = 'Acceso correcto';
            $vista = 'prueba/result.html.twig';
        }
        else{
            $msj = 'usuario o contraseña incorrectos';
            $vista = 'login/index.html.twig';
        }

        return $this->render($vista, [
            'controller_name' => 'PruebaController', 'msj' => $msj
            ]);
    }

}

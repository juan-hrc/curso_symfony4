<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;  

    /**
     * @Route("/login", name="login")
     */

class LoginController extends AbstractController
{
    /**
     * @Route("/inicio", name="inicio")
     */
    public function index(): Response
    {
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'dato'=>1000
        ]);
    }


    /**
     * @Route("/control", name="control")
     */
    public function control(Request $request)
    {
        $entrada = $request->request->get("algo");

        //

        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'dato'=>$entrada
        ]);
    }

}

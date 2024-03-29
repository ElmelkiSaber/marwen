<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->redirectToRoute('fos_user_security_login');
    }

     /**
     * @Route("/admin", name="dashboard")
     */
    public function adminAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/admin.html.twig');
    }
}

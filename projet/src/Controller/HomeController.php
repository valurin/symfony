<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template; 
use Symfony\Component\HttpFoundation\Request;
class HomeController extends Controller
{

	/**
     * @Route("/home", name="home")
     * @Template("main/home.html.twig")
     */
    public function home()
    {
    
    }

}
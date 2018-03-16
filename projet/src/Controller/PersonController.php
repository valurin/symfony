<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template; 
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Person;

class PersonController extends Controller
{
	
	/**
     * @Route("/connect", name="person_connect")
     * @Template("main/connect.html.twig")
     */
	public function connect(){
		return $this->render("main/connect.html.twig", ["project_name" => "yourProject"]);
	}
	
}



?>
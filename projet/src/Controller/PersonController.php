<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
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

	/**
     * @Route("/person/add", name="person_add")
     * @Template("main/addperson.html.twig")
     */
	public function add(Request $request, Person $person=null){
        if($person ==null )
            $person = new Person();
        $form = $this->createFormBuilder($person)
        ->add("firstname", TextType::class)
        ->add("lastname", TextType::class)
        ->add("username", TextType::class)
        ->add("password", PasswordType::class)
        
        ->add("save", SubmitType::class, ["label" => "create person"])
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();
            return $this->redirectToRoute("person_all");
        }
        return $this->render("main\addperson.html.twig", ["form" => $form->createView()]);
    }

    /**
     * @Route("/person/all", name="person_all")
     * @Template("main/allperson.html.twig")
     */
    public function all(){
    	$users = array();
 		$em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(Person::class)->findAll();
        return ["persons" => $users];
 	}

    public function del(Person $person){
        $em = $this->getDoctrine()->getManager();
        $em->remove($person);
        $em->flush();
        return $this->redirectToRoute("person_all");
    }
	
}



?>
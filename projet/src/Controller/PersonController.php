<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template; 
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Person;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class PersonController extends Controller
{
    /**
     * @Route("/login", name="login")
     * @Template("main/connect.html.twig")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils){
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        
        return $this->render("main\connect.html.twig",  array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
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
        ->add("role", ChoiceType::class, array('choices'=>array(
            'Demandeur' => 'ROLE_DEM',
            'Opérateur' => 'ROLE_OP',
            'Responsable service' => 'ROLE_ADMIN',
        ),))
        
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
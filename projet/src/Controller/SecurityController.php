<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template; 

class SecurityController extends Controller
{
	/**
     * @Route("/login", name="login")
     */
    public function login2(Request $request, AuthenticationUtils $authenticationUtils)
	{
		// get the login error if there is one
		$error = $authenticationUtils->getLastAuthenticationError();

		// last username entered by the user
		$lastUsername = $authenticationUtils->getLastUsername();

		return $this->render('main/connect.html.twig', array(
			'last_username' => $lastUsername,
			'error'         => $error,
		));
	}

	/*public function login(Request $request, Person $person=null){
        if($person ==null )
            $person = new Person();
        $form = $this->createFormBuilder($person)
        ->add("username", TextType::class)
        ->add("password", PasswordType::class)
        
        ->add("save", SubmitType::class, ["label" => "Connexion"])
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();
            return $this->redirectToRoute("person_all");
        }
        return $this->render("main\addperson.html.twig", ["form" => $form->createView()]);
    }*/
	
	
}


?>
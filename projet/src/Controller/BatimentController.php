<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template; 
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Batiment;

class BatimentController extends Controller
{
	
	/**
     * @Route("/batiment", name="batiment.home")
     */
	public function homeBatiment(){
		return new Response(
            "<html><body>
            	<h1>Page de choix</h1>
            	<p>check /add ou /all </p>
            </body></html>"
        );
	}

 	/**
     * @Route("/batiment/add", name="batiment.add")
     * @Template("main/addb.html.twig")
     */
	public function add(Request $request, Batiment $batiment=null){
        if($batiment ==null )
            $batiment = new Batiment();
        $form = $this->createFormBuilder($batiment)
        ->add("name", TextType::class)
        ->add("save", SubmitType::class, ["label" => "create Batiment"])
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($batiment);
            $em->flush();
            return $this->redirectToRoute("batiment.all");
        }
        return $this->render("main\addb.html.twig", ["form" => $form->createView()]);
    }

 	/**
     * @Route("/batiment/all", name="batiment.all")
     * @Template("main/allb.html.twig")
     */
 	
 	public function all(){
 		$em = $this->getDoctrine()->getManager();
        $batiment = $em->getRepository(Batiment::class)->findAll();
        return ["batiments" => $batiment];
 	}
	
}
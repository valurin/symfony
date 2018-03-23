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
use App\Entity\Poste;
use App\Entity\Batiment;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PosteController extends Controller
{
	
	/**
     * @Route("/poste", name="poste.home")
     */
	public function homePoste(){
		return new Response(
            "<html><body>
            	<h1>Page de choix</h1>
            	<p>check /add ou /all </p>
            </body></html>"
        );
	}

 	/**
     * @Route("/poste/add", name="poste.add")
     * @Template("main/addp.html.twig")
     */
	public function add(Request $request, Poste $poste=null){
        if($poste ==null )
            $poste = new Poste();
        $form = $this->createFormBuilder($poste)
        ->add("name", TextType::class)  
        ->add("batiment", EntityType::class, array(
            'class' => Batiment::class,
            'choice_label' => 'name'
        ))

        ->add("save", SubmitType::class, ["label" => "create Poste"])
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($poste);
            $em->flush();
            return $this->redirectToRoute("poste.all");
        }
        return $this->render("main\addp.html.twig", ["form" => $form->createView()]);
    }

 	/**
     * @Route("/poste/all", name="poste.all")
     * @Template("main/allp.html.twig")
     */
 	
 	public function all(){
 		$em = $this->getDoctrine()->getManager();
        $postes = $em->getRepository(Poste::class)->findAll();
        return ["postes" => $postes];
 	}
	
}
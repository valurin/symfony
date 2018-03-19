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
use App\Entity\Ticket;

class TicketController extends Controller
{
	
	/**
     * @Route("/ticket", name="ticket.home")
     * @Template("main/ticket.html.twig")
     */
	public function homeTicket(){
	
	}

 	/**
     * @Route("/ticket/add", name="ticket.add")
     * @Template("main/add.html.twig")
     */
	public function add(Request $request, Ticket $ticket=null){
        if($ticket ==null )
            $ticket = new Ticket();
        $form = $this->createFormBuilder($ticket)
        ->add("name", TextType::class)
        ->add("releaseOn", DateType::class, ["widget" => "single_text"])
        ->add("description", TextType::class)
        ->add("urgence", ChoiceType::class, array('choices'=>array(
            'Peu urgent' => 1,
            'Urgent' =>2,
            'Très urgent' =>3,
        ),))
        ->add("save", SubmitType::class, ["label" => "create Ticket"])
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();
            return $this->redirectToRoute("ticket.add");
        }
        return $this->render("main\add.html.twig", ["form" => $form->createView()]);
    }

 	/**
     * @Route("/ticket/all", name="ticket.all")
     * @Template("main/all.html.twig")
     */
 	
 	public function all(){
        $tickets=array();
 		$em = $this->getDoctrine()->getManager();
        $tickets= $em->getRepository(Ticket::class)->findAll();
        //$tickets= $em->getRepository(Ticket::class)->findBy(['urgence'=>1]);
        //$tickets->orderBy('urgence','ASC');
        return ["tickets" => $tickets];
 	
    }

    /**
    * @Route("/ticket/del/{ticket}")
    * @Template("main/all.html.twig")
    */
    public function del(Ticket $ticket){
        $em = $this->getDoctrine()->getManager();
        $em->remove($ticket);
        $em->flush();
        return $this->redirectToRoute("ticket.all");
    }
	
}
<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function home()
    {
    	return new Response(
            "<html><body>
            	<h1>Page des tickets github ready</h1>
            	<p>Page de base, a remplacer par la co plus tard, faut maintenant gérer les tickets</p>
            </body></html>"
        );
    }

}
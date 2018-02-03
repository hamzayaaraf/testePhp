<?php

namespace teste\testeBundle\Controller;
use teste\testeBundle\Entity\Joeur;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class JoeurController extends Controller
{
    /**
     * @Route("/teste/")
     * @Template()
     */
    public function indexAction()
    {
	
		$j = new Joeur();
		
		$card = $j->getCards();
        return array('cards' => $card);
    }
}

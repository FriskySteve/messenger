<?php

namespace FriskySteve\MessengerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller
{
    /**
     * @Route("/showAllUsers")
     * @Template("MessengerBundle::user.html.twig")
     */
    public function showAllUsersAction()
    {
        $repository = $this->getDoctrine()->getRepository("MessengerBundle:User");
        $user = $repository->findAll();
        return array('users'=>$user);
    }
    
    public function addToConversation($conversation_id, $user_id){
        
        
    }

}

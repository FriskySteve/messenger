<?php

namespace FriskySteve\MessengerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;



class PanelController extends Controller
{
    /**
     * @Route("/panel", name="panel")
     * @Template("MessengerBundle::panel.html.twig")
     */
    public function newConversationAction()
    {
        
    }

    /**
     * @Route("/addUser")
     */
    public function addUserAction()
    {
        return $this->render('MessengerBundle:ConversationAction:add_user.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/close")
     */
    public function closeAction()
    {
        return $this->render('MessengerBundle:ConversationAction:close.html.twig', array(
            // ...
        ));
    }

}

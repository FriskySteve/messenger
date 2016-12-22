<?php

namespace FriskySteve\MessengerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/panel/")
 */

class PanelController extends Controller
{
    /**
     * @Route("/newConversation")
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

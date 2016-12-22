<?php

namespace FriskySteve\MessengerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FriskySteve\MessengerBundle\Entity\Message;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class MessageController extends Controller
{
    /**
     * @Route("/newMessage/{id}")
     * @Template("MessengerBundle:MessageAction:new.html.twig")
     * @Method({"POST", "GET"})
     */
    public function newMessageAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository("MessengerBundle:Message");
        $message = new Message();
       
        $form = $this->createFormBuilder($message)
            ->add('post', TextareaType::class, array( 'attr'=>array( 'placeholder'=>'Type ...' ) ) )
            ->add('save','submit')
            ->getForm();
       
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $repo = $this->getDoctrine()->getRepository('MessengerBundle:Conversation');
            $conversation=$repo->findOneById($id);
            $message = $form->getData();
            $message->setUser( $this->getUser() );
            $message->setDate( new \DateTime() );
            $message->setConversation($conversation);
            

            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();
        }
        return array('form'=>$form->createView());

       
    }
    

}

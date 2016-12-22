<?php

namespace FriskySteve\MessengerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FriskySteve\MessengerBundle\Entity\Conversation;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ConversationController extends Controller
{
    /**
     * @Route("/conversation/{id}/{user}")
     * @Route("/conversation", defaults={"id"=false})
     * @Method({"GET", "POST"})
     * @Template("MessengerBundle:Conversation:new_conversation.html.twig")
     */
    public function newConversationAction(Request $request, $id, $user)
    {
        if($id){
            $repository = $this->getDoctrine()->getRepository("MessengerBundle:Conversation");
            $conversation = $repository->findOneById($id);  
        }else{
            $conversation = new Conversation();
        }
        
        $form = $this->createFormBuilder($conversation)
            ->add('title','text', array('attr'=>array('placeholder'=>'Podaj tytuł')))
            ->add('save','submit')
            ->getForm();
        
        $form->handleRequest($request);
        
        if( $form->isSubmitted() )
            {
            $user1=$this->getUser();
            $repo=$this->getDoctrine()->getRepository("MessengerBundle:User");
            $user2= $repo->findOneById($user);
            
            $conversation = $form->getData();
            $conversation->addUser($user1);
            $conversation->addUser($user2);
            
            $user1->addConversation($conversation);
            $user2->addConversation($conversation);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($conversation);
            $em->persist($user1);
            $em->persist($user2);
            $em->flush();
            
            $redirect = $this->redirectToRoute('newMessage', array('id' => $conversation->getId()));    
            return $redirect;
            }
        return array('form'=>$form->createView());
    }

    /**
     * @Route("/showAllCoversations/")
     * @Template("MessengerBundle::show_all_coversations.html.twig")
     */
    public function showAllCoversationsAction()
    {
        $repository = $this->getDoctrine()->getRepository("MessengerBundle:Conversation");
        $conversation = $repository->findAll();
        return array('conversations'=>$conversation);
    }

    /**
     * @Route("/showConversation/{id}")
     */
    public function showConversationAction($id)
    {
        $repository=$this->getDoctrine()->getRepository("MessengerBundle:Conversation");
        $conversation = $repository->findOneById($id);  
        echo '<pre>';
        return array('conversations'=>$conversation);
    }
    
    /**
     * @Route("/participantList/{conversation_id}", name="participantList")
     * @param type $conversation_id
     * @Template("MessengerBundle:Conversation:participant_list.html.twig")
     */
    
    public function participantListAction($conversation_id){
        $repository = $this->getDoctrine()->getRepository("MessengerBundle:Conversation");
        $conversation=$repository->findOneById($conversation_id);
        $participant = $conversation->getUsers();
        return array('participants'=>$participant);
    }
    
    /**
     * @Route("/addParticipant/{conversation_id}/{user_id}")
     * @param type $conversation_id
     * @param type $user_id
     * @Template("MessengerBundle:Conversation:add_participant.html.twig")
     */
    
    public function addParticipantAction($conversation_id, $user_id){
        $repository = $this->getDoctrine()->getRepository("MessengerBundle:Conversation");
        $conversation = $repository->findOneById($conversation_id);
        $repository2 = $this->getDoctrine()->getRepository("MessengerBundle:User");
        $user= $repository2->findOneById($user_id);
        $conversation->addUser($user);
        $user->addConversation($conversation);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($conversation);
        $em->persist($user);
        $em->flush();
        
        return $this->redirectToRoute('participantList', array('conversation_id'=>$conversation_id));
        
        
    }
    
    

}

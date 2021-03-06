<?php

namespace FriskySteve\MessengerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messages
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="FriskySteve\MessengerBundle\Repository\MessagesRepository")
 */
class Message
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="post", type="text")
     */
    private $post;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    /**
     * @ORM\ManyToOne(targetEntity="Conversation", inversedBy="messages")
     * @ORM\JoinColumn(name="conversation_id", referencedColumnName="id")
     * @var type 
     */
    
    private $conversation;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="messages")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @var type 
     */
    
    private $user;
    


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set post
     *
     * @param string $post
     * @return Messages
     */
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return string 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Messages
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set conversation
     *
     * @param \FriskySteve\MessengerBundle\Entity\Conversation $conversation
     * @return Message
     */
    public function setConversation(\FriskySteve\MessengerBundle\Entity\Conversation $conversation = null)
    {
        $this->conversation = $conversation;

        return $this;
    }

    /**
     * Get conversation
     *
     * @return \FriskySteve\MessengerBundle\Entity\Conversation 
     */
    public function getConversation()
    {
        return $this->conversation;
    }

    /**
     * Set user
     *
     * @param \FriskySteve\MessengerBundle\Entity\User $user
     * @return Message
     */
    public function setUser(\FriskySteve\MessengerBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \FriskySteve\MessengerBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}

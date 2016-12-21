<?php

namespace FriskySteve\MessengerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conversation
 *
 * @ORM\Table(name="conversation")
 * @ORM\Entity(repositoryClass="FriskySteve\MessengerBundle\Repository\ConversationRepository")
 */
class Conversation
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    
    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="conversations")
     * @var type 
     */
    
    private $users;
    
    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="conversation")
     * @var type 
     */
    
    private $messages;


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
     * Set title
     *
     * @param string $title
     * @return Conversation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add users
     *
     * @param \FriskySteve\MessengerBundle\Entity\User $users
     * @return Conversation
     */
    public function addUser(\FriskySteve\MessengerBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \FriskySteve\MessengerBundle\Entity\User $users
     */
    public function removeUser(\FriskySteve\MessengerBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add messages
     *
     * @param \FriskySteve\MessengerBundle\Entity\Message $messages
     * @return Conversation
     */
    public function addMessage(\FriskySteve\MessengerBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param \FriskySteve\MessengerBundle\Entity\Message $messages
     */
    public function removeMessage(\FriskySteve\MessengerBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }
}

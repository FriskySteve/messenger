<?php

namespace FriskySteve\MessengerBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="messenger_user")
 */

class User extends BaseUser
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
    /**
     * @ORM\Column(type="string", nullable=true)
     * @var type 
     */
    
    private $profile_pic;
    
    /**
     * @ORM\Column(type="boolean")
     * @var type 
     */
    
    private $online;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var type 
     */
    
    private $last_active;
    
    /**
     * @ORM\ManyToMany(targetEntity="Conversation", inversedBy="users")
     * @ORM\JoinTable(name="users_conversations")
     * @var type 
     */
    
    private $conversations;
    
    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="user")
     * @var type 
     */
    
    private $messages;


    public function __construct() {
        parent::__construct();
    }
    

    /**
     * Set profile_pic
     *
     * @param string $profilePic
     * @return User
     */
    public function setProfilePic($profilePic)
    {
        $this->profile_pic = $profilePic;

        return $this;
    }

    /**
     * Get profile_pic
     *
     * @return string 
     */
    public function getProfilePic()
    {
        return $this->profile_pic;
    }

    /**
     * Set online
     *
     * @param boolean $online
     * @return User
     */
    public function setOnline($online)
    {
        $this->online = $online;

        return $this;
    }

    /**
     * Get online
     *
     * @return boolean 
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * Set last_active
     *
     * @param \DateTime $lastActive
     * @return User
     */
    public function setLastActive($lastActive)
    {
        $this->last_active = $lastActive;

        return $this;
    }

    /**
     * Get last_active
     *
     * @return \DateTime 
     */
    public function getLastActive()
    {
        return $this->last_active;
    }

    /**
     * Add conversations
     *
     * @param \FriskySteve\MessengerBundle\Entity\Conversation $conversations
     * @return User
     */
    public function addConversation(\FriskySteve\MessengerBundle\Entity\Conversation $conversations)
    {
        $this->conversations[] = $conversations;

        return $this;
    }

    /**
     * Remove conversations
     *
     * @param \FriskySteve\MessengerBundle\Entity\Conversation $conversations
     */
    public function removeConversation(\FriskySteve\MessengerBundle\Entity\Conversation $conversations)
    {
        $this->conversations->removeElement($conversations);
    }

    /**
     * Get conversations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConversations()
    {
        return $this->conversations;
    }

    /**
     * Add messages
     *
     * @param \FriskySteve\MessengerBundle\Entity\Message $messages
     * @return User
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

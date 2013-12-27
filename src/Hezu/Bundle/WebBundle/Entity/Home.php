<?php

namespace Hezu\Bundle\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Home
 */
class Home
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $users;


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
     * Set users
     *
     * @param string $users
     * @return Home
     */
    public function setUsers($users)
    {
        $this->users = $users;
    
        return $this;
    }

    /**
     * Get users
     *
     * @return string 
     */
    public function getUsers()
    {
        return $this->users;
    }
}

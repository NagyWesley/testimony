<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
/*
 * Commands with doctrine:
 * 1-validate mapping
 * ./vendor/bin/doctrine-module orm:validate-schema
 * 
 * 2-generate database
 * ./vendor/bin/doctrine-module orm:schema-tool:create
 */

class User
{

    const Active = 1;
    const Inactive = 0;
    const User = 1;
    const Admin = 2;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $full_name;

    /** @ORM\Column(type="string") */
    protected $password;

    /** @ORM\Column(type="string") */
    protected $email;

    /** @ORM\Column(type="integer") */
    protected $status;

    /** @ORM\Column(type="integer") */
    protected $role;

    public function getId()
    {
        return $this->id;
    }

    public function getFull_name()
    {
        return $this->full_name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFull_name($full_name)
    {
        $this->full_name = $full_name;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

}

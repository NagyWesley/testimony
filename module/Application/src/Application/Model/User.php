<?php

namespace Application\Model;

class User
{

    private $_services;

    public function __construct($entityManager)
    {
        $this->_services = new \Application\Service\User($entityManager);
    }
    
    public function saveUser($params)
    {
        return $this->_services->saveUser($params);
        
    }

    public function getUsers()
    {
        return $this->_services->getUsers();
    }
}

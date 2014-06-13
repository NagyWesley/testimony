<?php

namespace Application\Model;

use Zend\Crypt\Password\Apache;
use Zend\Session\Container;
use Zend\Authentication\AuthenticationService;

class Login
{

    /**
     *
     * @var \Zend\Authentication\Adapter\DbTable
     */
    private $_adapter;

    public function __construct($ad)
    {
        $this->_adapter = new \Zend\Authentication\Adapter\DbTable($ad, 'User', 'user_name', 'password');
    }

    public function auth($params)
    {
        $this->_adapter->setIdentity($params['userName']);
        $this->_adapter->setCredential($params['password']);
        $this->_adapter->setCredentialTreatment('MD5(?)');
        
        $auth = new AuthenticationService();
        $result = $auth->authenticate($this->_adapter);
        
        return $result;
    }
//
//    private function encryptPassword($password)
//    {
//        $bcrypt = new Apache(array(
//            'format' => 'md5'
//        ));
//        $securePass = $bcrypt->create($password);
//        return $securePass;
//    }

}

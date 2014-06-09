<?php

namespace Application\Model;

use Zend\Crypt\Password\Apache;

class Login
{

    /**
     *
     * @var \Zend\Authentication\Adapter\DbTable
     */
    private $_adapter;

    public function __construct($ad)
    {
        $this->_adapter = new \Zend\Authentication\Adapter\DbTable($ad, 'User', 'email', 'password');
    }

    public function auth($params)
    {
        $this->_adapter->setIdentity($params['email']);
        $this->_adapter->setCredential($params['password']);
        $this->_adapter->setCredentialTreatment('MD5(?)');
        $result = $this->_adapter->authenticate();
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

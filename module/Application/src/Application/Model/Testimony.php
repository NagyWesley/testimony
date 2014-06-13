<?php

namespace Application\Model;
use Zend\Session\Container;
class Testimony
{

    private $_services;
    private $_em;

    public function __construct($entityManager)
    {
        $this->_em = $entityManager;
        $this->_services = new \Application\Service\Testimony($entityManager);
    }

    public function getLatest()
    {
        $tests = $this->_services->getTestimonies(10);
        $tests = $this->convertDate($tests);
        $tests = $this->limitTest($tests);
        return $tests;
    }

    private function convertDate($tests)
    {
        foreach ($tests as &$test) {
            $date = $test['created']->getTimestamp();
            $test['created'] = date('d/m/Y', $date);
        }

        return $tests;
    }

    public function addTestimony($params)
    {
        $share_storage = new Container('share');
        $share_storage->formData = null;
        $params['author'] = $this->setAuthor();
        $this->_services->saveTestimony($params);
    }

    private function setAuthor()
    {
        $userModel = new \Application\Model\User($this->_em);
        $uID = $userModel->getUser();

        return $uID;
    }

    private function getAuthor()
    {
        
    }

    private function limitTest($tests)
    {
        foreach ($tests as &$test) {
            $test['content'] = substr($test['content'], 0, 200);
            $test['content'] = $test['content'] . '....';
        }
        return $tests;
    }

    public function getTestimony($id)
    {
        $test = $this->_services->getTestimony($id);

        $test = $this->convertDate($test);

        return $test[0];
    }

}

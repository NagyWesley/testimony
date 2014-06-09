<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\User;
use Application\Form\RegistrationFilter as RegFilter;

class IndexController extends AbstractActionController
{

    private $_model;
    private $_view;

    public function __construct()
    {


        $this->_view = new ViewModel();
    }

    public function editAction()
    {
        
    }

    public function indexAction()
    {
            $em = $this->getServiceLocator()
                        ->get('Doctrine\ORM\EntityManager');
        $this->_model = new \Application\Model\User($em);
        $this->_view->users=$this->_model->getUsers();
        
        return $this->_view;
        
    }


}

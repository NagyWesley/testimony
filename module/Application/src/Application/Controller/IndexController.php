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


    public function indexAction()
    {
        $this->layout()->identity = $this->identity();

        $em = $this->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        $this->_model = new \Application\Model\Testimony($em);
        $this->_view->tests = $this->_model->getLatest();

        return $this->_view;
    }
    
    public function wordsAction()
    {
        
    }

}

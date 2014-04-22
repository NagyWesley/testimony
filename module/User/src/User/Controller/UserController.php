<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Model\UserTable;
use User\Model\User;

class UserController extends AbstractActionController
{
    protected $userTable;

    public function indexAction()
    {
        $users =$this->getUserTable()->fetchAll();
         return new ViewModel(array(
             'users' => $this->getUserTable()->fetchAll(),
         ));
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function editAction()
    {
        return new ViewModel();
    }
      public function getUserTable()
     {
         
         if (!$this->userTable) {
             $sm = $this->getServiceLocator();
             $this->userTable = $sm->get('User\Model\UserTable');
             
         }
         
         return $this->userTable;
     }


}


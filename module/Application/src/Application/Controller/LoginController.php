<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\User;
use Application\Form\RegistrationFilter as RegFilter;

class LoginController extends AbstractActionController
{

    private $_model;
    private $_view;

    public function __construct()
    {


        $this->_view = new ViewModel();
    }

    public function registerAction()
    {
        $ad = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');


        $registerForm = new \Application\Form\Registration();
        $registerForm->setInputFilter(new RegFilter($ad));

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            $registerForm->setData($formData);


            if ($registerForm->isValid()) {

                $em = $this->getServiceLocator()
                        ->get('Doctrine\ORM\EntityManager');

                $this->_model = new \Application\Model\User($em);

                $user = $this->_model->saveUser($formData);

                if (get_class($user) == "Application\Entity\User") {


                    return $this->redirect()->toRoute("login");
                } else {


                    return $this->redirect()->toRoute("registration");
                }
            } else {
                $viewModel = new ViewModel(
                        array(
                    'error' =>
                    $registerForm->getMessages(),
                    'registerForm' => $registerForm
                ));
                return $viewModel;
            }
        }



        $this->_view->setVariable("registerForm", $registerForm);
        return $this->_view;
    }

    public function loginAction()
    {

        $loginForm = new \Application\Form\Login();
        

        $this->flashMessenger()->addMessage("correct");
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            $loginForm->setData($formData);

            if ($loginForm->isValid()) {

                $ad = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
                $loginModel = new \Application\Model\Login($ad);



                $result = $loginModel->auth($formData);



                if ($result->isValid()) {

                    
                    return $this->redirect()->toRoute("application");
                } else {
                    $this->_view->messages= $result->getMessages();
                    
                }
            }
        }

        
        $this->_view->loginForm = $loginForm;
        
        return $this->_view;
    }

}

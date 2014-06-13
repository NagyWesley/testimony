<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\User;
use Application\Form\RegistrationFilter as regFilter;
use Application\Form\LoginFilter as logFilter;
use Zend\Session\Container;

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
        $registerForm->setInputFilter(new regFilter($ad));

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
        if (!is_null($this->identity())) {
            $this->layout()->identity = $this->identity();
            return $this->redirect()->toRoute("home");
        }
        $loginForm = new \Application\Form\Login();
        $loginForm->setInputFilter(new logFilter());


        $this->flashMessenger()->addMessage("correct");
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            $loginForm->setData($formData);

            if ($loginForm->isValid()) {

                $ad = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
                $loginModel = new \Application\Model\Login($ad);



                $result = $loginModel->auth($formData);



                if ($result->isValid()) {

                    $share_storage = new Container('share');
                    if (!is_null($share_storage->formData)) {
                        return $this->redirect()->toRoute("share");
                    }
                    return $this->redirect()->toRoute("home");
                } else {
                    $this->_view->messages = $result->getMessages();
                }
            }
        }


        $this->_view->loginForm = $loginForm;

        return $this->_view;
    }

    public function logoutAction()
    {

        $authService = $this->getServiceLocator()->get('AuthService');
        $authService->clearIdentity();
        return false;
    }

}

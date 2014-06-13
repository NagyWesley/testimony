<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use \Application\Form\shareFilter;
use Zend\Session\Container;

class TestimonyController extends AbstractActionController
{

    private $_model;
    private $_view;

    public function __construct()
    {

        $this->_view = new ViewModel();
    }

    public function shareAction()
    {
        $this->layout()->identity = $this->identity();
        $em = $this->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        $this->_model = new \Application\Model\Testimony($em);
        $shareForm = new \Application\Form\Share();
        
        $shareForm->setInputFilter(new shareFilter());
        $this->_view->shareForm = $shareForm;
        $share_storage = new Container('share');



        if ($this->getRequest()->isPost()) {

            $formData = $this->getRequest()->getPost();
            $shareForm->setData($formData);
            $share_storage->formData = $formData;
            $formData['userName'] = $this->identity();

            $shareForm->setData($formData);
            if ($shareForm->isValid()) {
                $this->_model->addTestimony($formData);
                return $this->redirect()->toRoute("application");
            }
        } else {
            if (!is_null($share_storage->formData)) {
                $formData = $share_storage->formData;
                $shareForm->setData($formData);
            }
        }
        return $this->_view;
    }

    public function testimonyAction()
    {
        $this->layout()->identity = $this->identity();
        $id = $this->params("id");
        $em = $this->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        $this->_model = new \Application\Model\Testimony($em);
        $test = $this->_model->getTestimony($id);

        $this->_view->test = $test;
        return $this->_view;
    }

}

<?php

namespace Application\Form;

use Zend\Form\Form;

class Login extends Form
{

    public function __construct()
    {
        parent::__construct("Login Form");

        $this->setAttribute('method', 'post');
        
  $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'email',
                'style' => "margin-left: 40px;margin-right: 10px"
            ),
            'options' => array(
                'label' => 'Email',
            ),
            
        ));
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'password',
                'style' => "margin-left: 10px"
            ),
            'options' => array(
                'label' => 'Password',
            ),
        ));

      

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submitbutton',
            ),
        ));
    }

}

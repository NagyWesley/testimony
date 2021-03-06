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
            'name' => 'userName',
            'type' => 'text',
            'attributes' => array(
                'style' => "margin-left: 5px;",
                'class' => "form-element",
            ),
            'options' => array(
                'label' => 'User Name',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'password',
                'style' => "margin-left: 10px",
                'class' => "form-element",
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

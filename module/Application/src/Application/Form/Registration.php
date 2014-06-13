<?php

namespace Application\Form;

use Zend\Form\Form;

class Registration extends Form
{

    public function __construct()
    {
        parent::__construct("Registration Form");

        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'fullname',
            'type' => 'text',
            'attributes' => array(
                'style' => "margin-left: 10px"
            ),
            'filters' => array(
                array(
                    'name' => 'StringTrim'
                )
            ),
            'options' => array(
                'label' => 'Full Name',
            ),
        ));

        $this->add(array(
            'name' => 'userName',
            'type' => 'text',
            'attributes' => array(
                'style' => "margin-left: 5px"
            ),
            'filters' => array(
                array(
                    'name' => 'StringTrim'
                )
            ),
            'options' => array(
                'label' => 'User Name',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'password',
            'attributes' => array(
                'style' => "margin-left: 10px"
            ),
            'options' => array(
                'label' => 'Password',
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'email',
            'attributes' => array(
                'style' => "margin-left: 40px;"
            ),
            'options' => array(
                'label' => 'Email',
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

<?php

namespace Application\Form;

use Zend\Form\Form;

class Registration extends Form
{

    public function __construct($db = null)
    {
        parent::__construct("Registration Form");

        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'fullname',
            'attributes' => array(
                'type' => 'text',
                'style' => "margin-left: 10px"
            ),
            'filters' => array(
                array(
                    'name' => 'StringTrim'
                )
            ),
            'validators' => array(
                array(
                    "name" => "sallary",
                    'type' => 'Zend\Form\Element\Number',
                    'attributes' => array(
                        'min' => 5,
                        'step' => 1
                    ),
                ),
            ),
            'options' => array(
                'label' => 'Full Name',
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
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submitbutton',
            ),
        ));
    }

}

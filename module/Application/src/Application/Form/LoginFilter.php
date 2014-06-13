<?php

namespace Application\Form;

use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class LoginFilter extends InputFilter
{

    public function __construct()
    {
        $this->add(
                array(
                    'name' => 'userName',
                    'required' => true,
                    'validators' => array(
                        array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'messages' => array(
                                    \Zend\Validator\NotEmpty::IS_EMPTY => 'User Name field is required'
                                ),
                                'color' => "red",
                            )
                        ),
                    )
                )
        );
        $this->add(
                array(
                    'name' => 'password',
                    'required' => true,
                     
                    'validators' => array(
                        array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'messages' => array(
                                    \Zend\Validator\NotEmpty::IS_EMPTY => 'Password field is required.'
                                ),
                                'class' =>"test"
                            )
                        ),
                    )
                )
        );
    }

}

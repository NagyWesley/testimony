<?php

namespace Application\Form;

use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class RegistrationFilter extends InputFilter
{

    public function __construct($db)
    {
        $this->add(
                array(
                    'name' => 'fullname',
                    'required' => true,
                    'validators' => array(
                        array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'messages' => array(
                                    \Zend\Validator\NotEmpty::IS_EMPTY => 'Your Full Name is required.'
                                )
                            )
                        ),
                    )
        ));
        $this->add(
                array(
                    'name' => 'password',
                    'required' => true,
                    'validators' => array(
                        array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'messages' => array(
                                    \Zend\Validator\NotEmpty::IS_EMPTY => 'Password is required.'
                                )
                            )
                        ),
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'min' => 6,
                                'messages' => array(
                                    \Zend\Validator\StringLength::TOO_SHORT => 'Password Must be Greater than 6 characters.'
                                )
                            )
                        ),
                    )
        ));
        $this->add(
                array(
                    'name' => 'email',
                    'required' => true,
                    'validators' => array(
                        array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'messages' => array(
                                    \Zend\Validator\NotEmpty::IS_EMPTY => 'Your Email Address is required.'
                                )
                            )
                        ),
                        array(
                            'name' => '\Zend\Validator\Db\NoRecordExists',
                            'options' => array(
                                'table' => 'User',
                                'field' => 'email',
                                'adapter' => $db,
                                'messages' => array(
                                    \Zend\Validator\Db\RecordExists::ERROR_RECORD_FOUND => 'EmailAddress is already in use.'
                                )
                            )
                        ),
                    )
                )
        );
        
        $this->add(
                array(
                    'name' => 'userName',
                    'required' => true,
                    'validators' => array(
                        array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'messages' => array(
                                    \Zend\Validator\NotEmpty::IS_EMPTY => 'User Name  is required.'
                                )
                            )
                        ),
                        array(
                            'name' => '\Zend\Validator\Db\NoRecordExists',
                            'options' => array(
                                'table' => 'User',
                                'field' => 'user_name',
                                'adapter' => $db,
                                'messages' => array(
                                    \Zend\Validator\Db\RecordExists::ERROR_RECORD_FOUND => 'User Name is already in use.'
                                )
                            )
                        ),
                    )
                )
        );
    }

}

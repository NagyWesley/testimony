<?php

namespace Application\Form;

use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class shareFilter extends InputFilter
{

    public function __construct()
    {
        $this->add(
                array(
                    'name' => 'userName',
                    'required' => true,
                    'allowNull' => false,
                    'validators' => array(
                        array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'messages' => array(
                                    \Zend\Validator\NotEmpty::IS_EMPTY => 'You need to login to be able to share.'
                                ),
                            )
                        ),
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'title',
                    'required' => true,
                    'validators' => array(
                        array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'messages' => array(
                                    \Zend\Validator\NotEmpty::IS_EMPTY => 'Title is required'
                                ),
                            )
                        ),
                    )
                )
        );
        $this->add(
                array(
                    'name' => 'content',
                    'required' => true,
                    'validators' => array(
                        array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'messages' => array(
                                    \Zend\Validator\NotEmpty::IS_EMPTY => 'Content is required.'
                                ),
                                'class' => "test"
                            )
                        ),
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'min' => 50,
                                'messages' => array(
                                    \Zend\Validator\StringLength::TOO_SHORT => 'Work of GOD is HUGE, please put more words in it. (min. 50 charcter)'
                                )
                            )
                        ),
                    )
                )
        );
    }

}

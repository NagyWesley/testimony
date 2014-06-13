<?php

namespace Application\Form;

use Zend\Form\Form;

class Share extends Form
{

    public function __construct()
    {
        parent::__construct("Share Form");

        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'userName',
            'type' => 'hidden',
        ));
        $this->add(array(
            'name' => 'title',
            'type' => 'text',
            'attributes' => array(
                'style' => "margin-left: 10px",
                'class' => "form-element",
            ),
            'filters' => array(
                array(
                    'name' => 'StringTrim'
                )
            ),
            'options' => array(
                'label' => 'Title',
            ),
        ));

        $this->add(array(
            'type' => 'Textarea',
            'name' => 'content',
            'attributes' => array(
                'style' => "margin-left: 10px; ",
                'rows'  => '8',
                'cols' => '120',
                'class' => "form-element",
                
            ),
            'options' => array(
                'label' => 'What happened',
                
            ),
        ));
        

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Share',
                'id' => 'submitbutton',
            ),
        ));
    }

}

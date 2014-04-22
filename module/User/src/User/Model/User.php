<?php

 namespace User\Model;

 class User
{
    public $id;
    public $emailaddress;
    public $name;
    public $location;
    
    public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->emailaddress = (!empty($data['emailaddress'])) ? $data['emailaddress'] : null;
         $this->name  = (!empty($data['name'])) ? $data['name'] : null;
         $this->location  = (!empty($data['location'])) ? $data['location'] : null;
     }
}

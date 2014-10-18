<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Lukasz
 */
class User 
{
    private $Id;
    private $Name;
    private $Surname;
    
    public function __construct($_id, $_name, $_surname) 
    {
        $this->id = $_id;
        $this->Name = $_name;
        $this->Surname = $_surname;
    }
    
    public function GetUserName()
    {
        return $this->Name.' '.$this->Surname;
    }
}

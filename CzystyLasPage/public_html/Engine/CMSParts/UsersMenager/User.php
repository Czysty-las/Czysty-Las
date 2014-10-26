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
    private $Login;
    private $Image;
    private $Abaut;
    
    public function __construct($_id, $_name, $_surname, $_login, $_password, $_image, $_Abaut) 
    {
        $this->Id = $_id;
        $this->Name = $_name;
        $this->Surname = $_surname;
        $this->Login = $_login;
        $this->Password = $_password;
        $this->Image = $_image;
        $this->Abaut = $_Abaut;
    }
    
    public function GetName()
    {
        return $this->Name;
    }
    
    public function GetSurname()
    {
        return $this->Surname;
    }
    
    public function GetUserName()
    {
        return $this->Name.' '.$this->Surname;
    }
    
    public function GetUserId() 
    {
        return $this->Id;
    }
    
    public function GetUserLogin() 
    {
        return $this->Login;
    }
    
    public function GetUserPassword()
    {
        return $this->Password;
    }

    public function GetUserImage()
    {
        return $this->Image;
    }
    
    public function GetUserAbaut() 
    {
        return $this->Abaut;
    }
}

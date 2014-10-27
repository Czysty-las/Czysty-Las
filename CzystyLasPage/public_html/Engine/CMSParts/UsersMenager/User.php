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
    private $Mail;
    
    public function __construct($_id, $_name, $_surname, $_login, $_password, $_mail, $_image, $_abaut) 
    {
        $this->Id = $_id;
        $this->Name = $_name;
        $this->Surname = $_surname;
        $this->Login = $_login;
        $this->Password = $_password;
        $this->Image = $_image;
        $this->Abaut = $_abaut;
        $this->Mail = $_mail;
        
    }
    
    public function GetName()
    {
        return $this->Name;
    }
  
    public function SetName($name) 
    {
        $this->Name = $name;
    }
    
    public function GetSurname()
    {
        return $this->Surname;
    }
    
    public function SetSurame($surname) 
    {
        $this->Surname = $surname;
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
    
    public function SetUserLogin($login) 
    {
        $this->Login = $login;
    }

    public function GetUserPassword()
    {
        return $this->Password;
    }

    public function GetUserImage()
    {
        return $this->Image;
    }
    public function SetUserImage($image)
    {
        $this->Image = $image;
    }
    
    public function GetUserAbaut() 
    {
        return $this->Abaut;
    }
    
    public function SetUserAbaut($abaut) 
    {
        $this->Abaut = $abaut;
    }

    public function GetUserMail()
    {
        return $this->Mail;
    }
    
    public function SetUserMail($mail)
    {
        $this->Mail = $mail;
    }
}

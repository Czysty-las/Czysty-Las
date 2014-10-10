<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author Lukasz
 */
class Database
{
    private $ip;
    private $user;
    private $password;
    
    public function __construct($_ip , $_user, $_password) 
    {
        $this->ip = $_ip;
        $this->user = $_user;
        $this->password = $_password;
        
        @mysql_connect($this->ip,  $this->user = $_user,  $this->password = $_password)
                or die('Conection faild...');
    }
}

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
    private $conection;
    private $ip                 ='';
    private $user               ='';
    private $password           ='';
    private $selectedDatabase   ='';


    public function __construct($_ip , $_user, $_password) 
    {
        $this->ip = $_ip;
        $this->user = $_user;
        $this->password = $_password;
        
        $this->conection = 
        @mysql_connect($this->ip,  $this->user = $_user,  $this->password = $_password)
                or die('Conection faild...');
    }
    
    public function SelectDatabase($_chois)
    {
        if($this->selectedDatabase != '')
        {
            echo 'You selected, a database,';
            return;
        }
        
        $this->selectedDatabase = $_chois;
        
        @mysql_select_db($this->selectedDatabase)
        or die("Database don't exsist");
    }
    
    public function CloseDatabase()
    {
        @mysql_close($this->conection);
    }
    
    public function SelectTable($_table)
    {
        $table = mysql_query('SELECT * FROM '.$_table)
            or die("Błąd w zapytaniu!");
        return $table;
    }
    
    public function AddUser($_Name, $_Surname, $_Email, $_Rights) 
    {
        echo $_Name;
        
        $q = "INSERT INTO `czysty-las-database`.`users` (`Id`, `Name`, `Surname`, `Email`, `Rights`, `RegisterCode`) VALUES (NULL, '$_Name', '$_Surname', '$_Email', '$_Rights', '123aavv');";
        echo $q;
        $ins = mysql_query($q);
         
        if($ins)
        {
            echo 'Dodane';
        }
        else
        {
            echo'NieDodane';
        }
        
    }

}
?>
<?php
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

    /*
     * Utworzenie połaczenia z bazą danych 
     */
    public function __construct($_ip , $_user, $_password, $_database) 
    {
        $this->ip = $_ip;
        $this->user = $_user;
        $this->password = $_password;
        
        $this->conection = 
        @mysql_connect($this->ip,  $this->user = $_user,  $this->password = $_password)
                or die('Conection faild...');
        
        $this->SelectDatabase($_database);
    }
    
    /*
     * Wybranie odpowiedniej bazy danych.
     * 
     * W przyszłoście zmienic na prywatne.
     */
    
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
    
    /*
     *  Zamkniecie połączenia z bazą danych. 
     */
    
    public function CloseDatabase()
    {
        @mysql_close($this->conection);
    }    
}
?>
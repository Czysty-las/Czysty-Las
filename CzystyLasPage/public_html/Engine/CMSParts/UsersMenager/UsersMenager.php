<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersMenager
 *
 * @author Lukasz
 */
/*
$_Name = $_POST['Name']; 
$_Surname = $_POST['Surname']; 
$_Email = $_POST['Email']; 
$_Rights = $_POST['Rights'];*/
class UsersMenager 
{
    private $users;
    private $print;
    private $table;
    private $ColsNames = array('Name', 'Surname', 'Email', 'Rights');
    
    public function __construct($_users) 
    {
        $this->users = $_users;
    }
    
    public function printUsers()
    {
        echo '<table>';
        echo '<tr>';
            echo '<td>Imie</td><td>Nazwisko</td><td>Email</td><td>Uprawnienia</td><td>Operacje</td>';
        echo '</tr>';
        while($print = mysql_fetch_array($this->users))
        {
            echo"<tr>";
               echo "<td>".$print[$this->ColsNames[0]]."</td><td>".$print[$this->ColsNames[1]]."</td><td>".$print[$this->ColsNames[2]]."</td><td>".$print[$this->ColsNames[3]].'</td><td><button type="button">Usiń</button><button type="button">Edytuj</button></td>';
            echo "</td>";
        }
        echo '<tr>';
        echo '<form action="CMS.php" method="post">';
            echo '<td><input type="text" name="Name"></td><td><input type="text" name="Surname"></td><td><input type="text" name="Email"></td><td><input type="text" name="Rights"></td><td><button type="submit" value="dodaj" class="add">Dodaj</button></td>';
        echo '</form>';
        echo '</tr>';
        echo '</table>';
    }
    
    public function AddUser($_Name, $_Surname, $_Email, $_Rights) 
    {
        echo'asdasfsdafkasldjfsadl;';
        @
        $ins = @mysql_query("INSERT INTO users SET Name ='$_Name', Surname='$_Surname', Email ='$_Email''Rights='$_Rights'");
         
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
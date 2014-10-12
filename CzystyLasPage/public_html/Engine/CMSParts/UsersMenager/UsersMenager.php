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
    private $ColsNames = array('Id', 'Name', 'Surname', 'Email', 'Rights', 'Login', 'Password');
        
    public function printUsers()
    {
        echo '<table>';
        echo '<tr>';
            echo '<td>Imie</td><td>Nazwisko</td><td>Email</td><td>Uprawnienia</td><td>Login</td><td>Hasło</td><td>Operacje</td>';
        echo '</tr>';
        
        $this->users = mysql_query('SELECT * FROM users');
        
        while($print = mysql_fetch_array($this->users))
        {
            echo '<form action="CMS.php" method="post">';
            echo"<tr>";
               echo '<td><input type="text" hidden="true" name="Id"  value="'.$print[$this->ColsNames[0]].'"/><input type="text" name="Name"  value="'.$print[$this->ColsNames[1]].'"/></td><td><input type="text" name="Surname"  value="'.$print[$this->ColsNames[2]].'"/></td><td><input type="text" name="Email"  value="'.$print[$this->ColsNames[3]].'"/></td><td><input type="text" name="Rights"  value="'.$print[$this->ColsNames[4]].'"/></td><td><input type="text" name="Login"  value="'.$print[$this->ColsNames[5]].'"/></td><td><input type="text" name="Password"  value="'.$print[$this->ColsNames[6]].'"/></td><td><button type="submit" name="function" value="delete">Usiń</button><button type="submit" name="function" value="edit">Edytuj</button></td>';
            echo "</td>";
            echo '</form>';
        }
        echo '<tr>';
        echo '<form action="CMS.php" method="post">';
            echo '<td><input type="text" name="Name"></td><td><input type="text" name="Surname"></td><td><input type="text" name="Email"></td><td><input type="text" name="Rights"></td><td><input type="text" name="Login"></td><td><input type="text" name="Password"></td><td><button type="submit" name="function" value="add" class="add">Dodaj</button></td>';
        echo '</form>';
        echo '</tr>';
        echo '</table>';
    }
    
    public function AddUser($_Name, $_Surname, $_Email, $_Rights) 
    {
        $q = "INSERT INTO `czysty-las-database`.`users` (`Id`, `Name`, `Surname`, `Email`, `Rights`, `RegisterCode`) VALUES (NULL, '$_Name', '$_Surname', '$_Email', '$_Rights', '123aavv');";
        $ins = mysql_query($q);
    }
    
    public function EditUser($_Id, $_Name, $_Surname, $_Email, $_Rights)
    {
        //UPDATE `czysty-las-database`.`users` SET `Name` = 'a', `Surname` = 'a', `Email` = 'a', `Rights` = 'a', `RegisterCode` = 'a' WHERE `users`.`Id` = 30
        //DELETE FROM `czysty-las-database`.`users` WHERE `users`.`Id` = 12"
        
        $q = "UPDATE `czysty-las-database`.`users` SET `Name` = '".$_Name."', `Surname` = '".$_Surname."', `Email` = '".$_Email."', `Rights` = '".$_Rights."', `RegisterCode` = 'a' WHERE `users`.`Id` = ".$_Id;
        $ins = mysql_query($q);
    }
    
    public function DeleteUser($_id)
    {
        $q = "DELETE FROM `czysty-las-database`.`users` WHERE `users`.`Id` = ".$_id;
        $ins = mysql_query($q);
        
        if($ins)
        {
            echo '';
        }
    }
}
?>
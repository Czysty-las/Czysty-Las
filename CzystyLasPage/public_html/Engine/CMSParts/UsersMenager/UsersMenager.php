<?php

/*
 * Description of UsersMenager
 *
 * @author Lukasz
 */

class UsersMenager 
{
    private $users;
    private $print;
    private $table;
    private $ColsNames = array('Id', 'Name', 'Surname', 'Email', 'Rights', 'Login', 'Password');
    
    /*
     * Funkcja generuje tabele, która umoźliwaia dodawanie usuwanie, jak i edycję urzytkowników.
     */
    
    public function printUsers()
    {
        //  Początek generowanie tabeli.
        echo '<table>';
        echo '<tr>';
            echo '<td>Imie</td><td>Nazwisko</td><td>Email</td><td>Uprawnienia</td><td>Login</td><td>Hasło</td><td>Operacje</td>';
        echo '</tr>';
        
        //  Składnie zapytania
        $q = 'SELECT * FROM users';
        $this->users = mysql_query($q); //  Wysłanie zapytania.
        
        //  Pętla generaująca poszczególne wiersze reprezentujące dodanych urzytkowników.
        
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
    
    /*
     * Funkcja wykonuje zapytanie do bazy danych, które dodaje urzytkowników.
     */
    
    public function AddUser($_Name, $_Surname, $_Email, $_Rights, $_Login, $_Password) 
    {
        // Składnia zapytania.
        $q = "INSERT INTO `czysty-las-database`.`users` (`Id`, `Name`, `Surname`, `Email`, `Rights`, `RegisterCode`, `Login`, `Password`) VALUES (NULL, '$_Name', '$_Surname', '$_Email', '$_Rights', '123aavv', '$_Login', '$_Password');";
        $ins = mysql_query($q); //  Wysłanie zapytania.
    }
    
    /*
     * Funkcaj wykonuje zapytanie do bazy danych, które edeytyje rekord o wzkazanym Id.
     */
    
    public function EditUser($_Id, $_Name, $_Surname, $_Email, $_Rights, $_Login, $_Password)
    {
        // Składnia zapytania.
        $q = "UPDATE `czysty-las-database`.`users` SET `Name` = '".$_Name."', `Surname` = '".$_Surname."', `Email` = '".$_Email."', `Rights` = '".$_Rights."', `RegisterCode` = 'a', `Login` = '".$_Login.", `Password` = '".$_Password."'  WHERE `users`.`Id` = ".$_Id;
        $ins = mysql_query($q); //  Wysłanie zapytania.
    }
    
    /*
     * Funkcja usuwa rekord o wskazanym Id.
     */
    
    public function DeleteUser($_id)
    {
        // Składnia zapytania.
        $q = "DELETE FROM `czysty-las-database`.`users` WHERE `users`.`Id` = ".$_id;
        $ins = mysql_query($q); //  Wysłanie zapytania.
    }
}
?>
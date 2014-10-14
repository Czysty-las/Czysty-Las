<?php
include '../Engine/CMSParts/Dadabase/DatabaseEditor.php';
/*
 * Description of UsersMenager
 *
 * @author Lukasz
 */

class UsersMenager extends DatabaseEditor
{
    private $users;
    /*
     * Konstruktor
     */
    public function __construct($_colNames = array(), $_target) 
    {
        parent::__construct($_colNames, $_target);
    }
    
    /*
     * Funkcja umoźliwająca zalogowanie się do serwisu. 
     */
    
    public function LogIn($_login, $_password)
    {
        
        $q = "SELECT * FROM `users` WHERE `Login` LIKE '$_login' AND `Password` LIKE '$_password'";
        $this->users = mysql_query($q); //  Wysłanie zapytania.
        
        return mysql_fetch_array($this->users);
    }
    
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
               echo '<td><input type="text" hidden="true" name="'.$this->ColsNames[0].'"  value="'.$print[$this->ColsNames[0]].
                       '"/><input type="text" name="'.$this->ColsNames[1].'"  value="'.$print[$this->ColsNames[1]].
                       '"/></td><td><input type="text" name="'.$this->ColsNames[2].'"  value="'.$print[$this->ColsNames[2]].
                       '"/></td><td><input type="text" name="'.$this->ColsNames[3].'"  value="'.$print[$this->ColsNames[3]].
                       '"/></td><td><input type="text" name="'.$this->ColsNames[4].'"  value="'.$print[$this->ColsNames[4]].
                       '"/></td><td><input type="text" name="'.$this->ColsNames[5].'"  value="'.$print[$this->ColsNames[5]].
                       '"/></td><td><input type="text" name="'.$this->ColsNames[6].'"  value="'.$print[$this->ColsNames[6]].
                       '"/></td><td>'.$this->DeleteButton.$this->EditButton.'</td>';
            echo "</td>";
            echo '</form>';
        }
        echo '<tr>';
        echo '<form action="'.$this->Target.'" method="post">';
            echo '<td><input type="text" name="Name">'
                . '</td><td><input type="text" name="Surname">'
                . '</td><td><input type="text" name="Email"></td>'
                . '<td><input type="text" name="Rights"></td>'
                . '<td><input type="text" name="Login"></td>'
                . '<td><input type="text" name="Password"></td>'
                . '<td>'.$this->AddButton.'</td>';
        echo '</form>';
        echo '</tr>';
        echo '</table>';

    }
    
    /*
     * Funkcja wykonuje zapytanie do bazy danych, które dodaje urzytkowników.
     */
    
    //public function Add($_Name, $_Surname, $_Email, $_Rights, $_Login, $_Password) 
    public function Add($_params = array()) 
    {
        // Składnia zapytania.
        $q = "INSERT INTO `czysty-las-database`.`users` (`Id`, `Name`, `Surname`, `Email`, `Rights`, `RegisterCode`, `Login`, `Password`) VALUES (NULL, '$_params[0]', '$_params[1]', '$_params[2]', '$_params[3]', '123aavv', '$_params[4]', '$_params[5]');";
        $ins = mysql_query($q); //  Wysłanie zapytania.
    }
    
    /*
     * Funkcaj wykonuje zapytanie do bazy danych, które edeytyje rekord o wzkazanym Id.
     */
    
    public function Edit($_params = array())
    {
        echo $_params[0];
        // Składnia zapytania.
        $q = "UPDATE `czysty-las-database`.`users` SET `Name` = '$_params[1]', `Surname` = '$_params[2]', `Email` = '$_params[3]', `Rights` = '$_params[4]', `Login` = '$_params[5]', `Password` = '$_params[6]'  WHERE `users`.`Id` = ".$_params[0];
        $ins = mysql_query($q); //  Wysłanie zapytania.
        
        echo $q;
    }
    
    /*
     * Funkcja usuwa rekord o wskazanym Id.
     */
    
    public function Delete($_param)
    {
        // Składnia zapytania.
        $q = "DELETE FROM `czysty-las-database`.`users` WHERE `users`.`Id` = ".$_param;
        $ins = mysql_query($q); //  Wysłanie zapytania.
    }
}
?>
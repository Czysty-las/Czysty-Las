<?php
//include '../Engine/CMSParts/Dadabase/DatabaseEditor.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsMenager
 *
 * @author Lukasz
 */
class NewsMenager extends DatabaseEditor
{
    
   public function __construct($_colNames = array(), $_target)
   {
       parent::__construct($_colNames, $_target,"news");
   }

    public function Show() 
    {
         //  Początek generowanie tabeli.
        echo '<div class="currentNews">';
        echo '<table class="newsTable">';
        echo '<tr>';
            echo '<td>Autor</td><td>Temat</td><td>Data</td><td>Operacje</td>';
        echo '</tr>';
        
        //  Składnie zapytania
        $q = 'SELECT * FROM news';
        $this->users = mysql_query($q); //  Wysłanie zapytania.
        
        
        //  Pętla generaująca poszczególne wiersze reprezentujące dodanych urzytkowników.
        

        while($print = mysql_fetch_array($this->users))
        {
            echo '<form action="'.$this->Target.'" method="post">';
            echo"<tr>";
               echo '<td>'
                    . '<input type="text" hidden="true" name="'.$this->ColsNames[0].'"  value="'.$print[$this->ColsNames[0]].'"/>'
                    . '<input type="text" name="'.$this->ColsNames[1].'"  value="'. $_SESSION['users']->SelectUserById($print[$this->ColsNames[1]]).'"/>'
                    . '</td><td><input type="text" name="'.$this->ColsNames[2].'"  value="'.$print[$this->ColsNames[2]].'"/>'
                    . '</td><td><input type="text" name="'.$this->ColsNames[4].'"  value="'.$print[$this->ColsNames[4]].'"/>'
                    . '</td><td>'.$this->DeleteButton.$this->EditButton.'</td>';
            echo "</td>";
            echo '</form>';
        }
        echo '<tr>';
        echo '</tr>';
        echo '</table>';
        echo '</div>';
        echo '<div class="newsEditFeald">';
        echo '<form action="'.$this->Target.'" method="post">';
        echo '<input type="text" name="'.$this->ColsNames[2].'" value="Temat"/>';
        echo '<textarea name="'.$this->ColsNames[3].'" class="newsContentFeald">Treść</textarea>';
        echo $this->AddButton;
        echo '</form>';
        echo '</div>';

    }

    public function Add($_params = array()) 
    {
        // Składnia zapytania.
        $date = date('d.m.Y\r.');
        $q = "INSERT INTO `czysty-las-database`.`news` (`Id`, `UserId`, `Topic`, `Content`, `Date`) VALUES (NULL, '$_params[0]', '$_params[1]', '$_params[2]', '$date')";
        $ins = mysql_query($q); //  Wysłanie zapytania.
    }

    public function Delete($_param) 
    {
        $q = "DELETE FROM `czysty-las-database`.`news` WHERE `news`.`Id` =".$_param;
        $ins = mysql_query($q);
    }

    public function Edit($_params = array()) 
    {
        
    }
}

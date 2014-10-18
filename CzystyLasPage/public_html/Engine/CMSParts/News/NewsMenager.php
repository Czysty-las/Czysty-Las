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
        echo '<table>';
        echo '<tr>';
            echo '<td>Autor</td><td>Temat</td><td>Treść</td>';
        echo '</tr>';
        
        //  Składnie zapytania
        $q = 'SELECT * FROM news';
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
                       '"/></td><td>'.$this->DeleteButton.$this->EditButton.'</td>';
            echo "</td>";
            echo '</form>';
        }
        echo '<tr>';
        echo '<form action="'.$this->Target.'" method="post">';
            echo '<td><input type="text" name="Name">'
                . '</td><td><input type="text" name="Surname">'
                . '</td><td><input type="text" name="Email"></td>'
                . '<td>'.$this->AddButton.'</td>';
        echo '</form>';
        echo '</tr>';
        echo '</table>';

       
    }

    public function Add($_params = array()) 
    {
        
    }

    public function Delete($_param) 
    {
        
    }

    public function Edit($_params = array()) 
    {
        
    }
}

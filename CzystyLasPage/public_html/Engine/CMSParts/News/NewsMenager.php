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
class NewsMenager extends DatabaseEditor {

    public function __construct($_colNames = array(), $_target) 
    {
        parent::__construct($_colNames, $_target, "news");
        $this->DeleteButton = '<button type="submit" name="function" value="delete_news" class="newsDeleteItem">-</button>';
    }

    public function Show() 
    {
        $_id;
         
        if(!isset($_GET['id']))
        {
            $_id = $_GET['id'];
        }
        //  Początek generowanie tabeli.
        echo '<div class="currentNews">';
        /*    echo '<table class="newsTable">';
          echo '<tr>';
          echo '<td>Autor</td><td>Temat</td><td>Data</td><td>Operacje</td>';
          echo '</tr>'; */
        if (isset($_GET['add'])) 
        {
            echo '<form action="' . $this->Target . '" method="post">';
            echo '<input type="text" name="' . $this->ColsNames[2] . '" value="Temat" class="newsItem" id="teopicInput"/>';
        }
        //  Składnie zapytania
        $q = 'SELECT * FROM `news` ORDER BY `news`.`Id` DESC';
        $this->users = mysql_query($q); //  Wysłanie zapytania.
        //  Pętla generaująca poszczególne wiersze reprezentujące dodanych urzytkowników.


        while ($print = mysql_fetch_array($this->users)) 
        {
            /*
          echo '<form action="'.$this->Target.'" method="post">';
          echo"<tr>";
          echo '<td>'
          . '<input type="text" hidden="true" name="'.$this->ColsNames[0].'"  value="'.$print[$this->ColsNames[0]].'"/>'
          . '<input type="text" name="'.$this->ColsNames[1].'"  value="'. $_SESSION['users']->SelectUserById($print[$this->ColsNames[1]]).'"/>'
          . '</td><td><input type="text" name="'.$this->ColsNames[2].'"  value="'.$print[$this->ColsNames[2]].'"/>'
          . '</td><td><input type="text" name="'.$this->ColsNames[4].'"  value="'.$print[$this->ColsNames[4]].'"/>'
          . '</td><td>'.$this->DeleteButton.$this->EditButton.'</td>';


          . '<a class="newsItem" href="CMS.php?function=news&id='.$print[$this->ColsNames[0]].'">'.$print[$this->ColsNames[2]].'</a>';
          echo "</td>";
          echo '</form>'; */
            
        if (!isset($_GET['add'])) 
        { 
            echo '<form action="'. $this->Target .'" method="post">'
            . '<input type="text" hidden="true" name="' . $this->ColsNames[0] . '"  value="' . $print[$this->ColsNames[0]] . '"/>';
            echo '<a class="newsItem" href="CMS.php?function=news&id=' . $print[$this->ColsNames[0]] . '">' . $print[$this->ColsNames[2]] . $this->DeleteButton . '</a>';
            echo '</form>';
        }
        else
        {
            echo '<a class="newsItem" href="CMS.php?function=news&id=' . $print[$this->ColsNames[0]] . '">' . $print[$this->ColsNames[2]] .'</a>';
        }
        }
        echo '<tr>';
        echo '</tr>';
        echo '</table>';
        echo '</div>';
        echo '<div class="newsEditFeald">';
        
        if (isset($_GET['add'])) 
        {

            echo '<textarea name="' . $this->ColsNames[3] . '" class="newsContentFeald">Treść</textarea>';
            echo $this->AddButton;
            echo '</form>';
        } 
        else 
        {

            echo '<a class="newsAddItem" href="CMS.php?function=news&add=true">Dodaj</a>';
        }
        echo '</div>';
    }

    public function Add($_params = array()) {
        // Składnia zapytania.
        $date = date('d.m.Y\r.');
        $q = "INSERT INTO `czysty-las-database`.`news` (`Id`, `UserId`, `Topic`, `Content`, `Date`) VALUES (NULL, '$_params[0]', '$_params[1]', '$_params[2]', '$date')";
        $ins = mysql_query($q); //  Wysłanie zapytania.
    }

    public function Delete($_param) {
        $q = "DELETE FROM `czysty-las-database`.`news` WHERE `news`.`Id` =" . $_param;
        $ins = mysql_query($q);
    }

    public function Edit($_params = array()) {
        
    }

}

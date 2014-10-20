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
        $this->AddButton    = '<button type="submit" name="function" value="add_news" class="newsOK">OK</button>';
        $this->EditButton   = '<button type="submit" name="function" value="edit_news" class="newsOK">OK</button>';
    }

    public function Show() 
    {
        $_id = 0; $_author = ''; $_content = '';
        
        if(isset($_GET['id'])) $_id = $_GET['id'];
        
        echo '<div class="currentNews">';    
        
        if(isset($_GET['add']) || $_id > 0)
        {
            if($_id > 0)
            {
                echo '<form action="' . $this->Target . '" method="post">';    
            }
            else
            {
                echo '<form action="' . $this->Target . '" method="post">';
                echo '<input type="text" name="' . $this->ColsNames[2] . '" value="Temat" class="newsItem" id="teopicInput"/>';                
            }
        }

        //  Składnie zapytania
        $q = 'SELECT * FROM `news` ORDER BY `news`.`Id` DESC';
        $this->users = mysql_query($q); //  Wysłanie zapytania.
        //  Pętla generaująca poszczególne wiersze reprezentujące dodanych urzytkowników.


        while ($print = mysql_fetch_array($this->users)) 
        {
            
            if (!isset($_GET['add'])) 
            {
                if($_id == $print[$this->ColsNames[0]])
                {
                    echo '<input type="text" name="' . $this->ColsNames[2] . '" value="'.$print[$this->ColsNames[2]].'" class="newsItem" id="teopicInput"/><div class="newsPointItem">></div>'
                        .'<input type="text" hidden="true" name="' . $this->ColsNames[0] . '"  value="' . $print[$this->ColsNames[0]] . '"/>';
                    $_content = $print[$this->ColsNames[3]];
                }
                else 
                {
                    if(!$_id > 0)
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
        
        if (isset($_GET['add']) || $_id > 0) 
        {
            if($_id > 0)
            {
                echo '<textarea rows="40" name="'.$this->ColsNames[3].'" class="ckeditor">'.$_content.'</textarea>'
                     .'<input type="text" hidden="true" name="' . $this->ColsNames[1] . '"  value="' . $print[$this->ColsNames[1]] . '"/>';;
                echo $this->EditButton;
                echo '</form>';
            }
            else 
            {
                echo '<textarea name="' . $this->ColsNames[3] . '" class="ckeditor">Treść</textarea>';
                echo $this->AddButton;
                echo '</form>';
            }
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

    public function Delete($_param) 
    {
        $q = "DELETE FROM `czysty-las-database`.`news` WHERE `news`.`Id` = '$_param'" ;
        $ins = mysql_query($q);
    }

    public function Edit($_params = array()) 
    {
        $q = "UPDATE `czysty-las-database`.`news` SET `UserId` = '$_params[1]', `Topic` = '$_params[2]', `Content` = '$_params[3]' WHERE `news`.`Id` = '$_params[0]'";
        $ins = mysql_query($q); //  Wysłanie zapytania.
    }

}

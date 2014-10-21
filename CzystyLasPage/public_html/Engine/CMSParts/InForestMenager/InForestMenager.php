<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InForestMenager
 *
 * @author Lukasz
 */
class InForestMenager extends DatabaseEditor
{
    
    public function __construct($_colNames = array(), $_target) 
    {
        parent::__construct($_colNames, $_target, 'inforest');
        
        $this->DeleteButton = '<button type="submit" name="function" value="delete_inforest" class="newsDeleteItem">-</button>';
        $this->AddButton    = '<button type="submit" name="function" value="add_inforest" class="newsOK">OK</button>';
        $this->EditButton   = '<button type="submit" name="function" value="edit_inforest" class="newsOK">OK</button>';

    }

    public function Add($_params = array()) 
    {
        $q = "INSERT INTO `czysty-las-database`.`images` (`Id`, `Name`) VALUES (NULL, '$_params[3]')";
        $ins = mysql_query($q);
        
        move_uploaded_file($_params[0],"Data/Images/".$_params[3]);
        
        $id = mysql_insert_id();
        $q = "INSERT INTO `czysty-las-database`.`inforest` (`Id`, `Photo`, `Title`, `Description`) VALUES (NULL, '$id', '$_params[1]', '$_params[2]')";
        $ins = mysql_query($q);
    }

    public function Delete($_param) 
    {
        
    }

    public function Edit($_params = array()) 
    {
        
    }

    public function Show() 
    {
        
        if(!isset($_GET['add']))
        {         
            $q = "SELECT * FROM `inforest`";
            $ins = mysql_query($q);
            echo '<div class="inforestContent">';
            echo '<a class="inforestAddItem" href="CMS.php?function=inforest&add=true">Dodaj</a>';

            while ($print = mysql_fetch_array($ins)) 
            {
                $q = "SELECT * FROM `images` WHERE `Id` = ".$print[$this->ColsNames[1]];
                $ins1 = mysql_query($q);
                $print1 = mysql_fetch_array($ins1);


                echo '<a class="inforestItem">';
                echo '<div class="inforestImageHolder">';
                echo '<img class="inforesrImage" src="./Data/Images/'.$print1['Name'].'" href="sadas">';
                echo '</div>';
                echo '<div class="inforestTopicHolder">';
                echo '<p>'.$print[$this->ColsNames[2]].'<p>';
                echo '</div>';
                echo '<div class="inforestDiscriptionHolder">';
                echo $print[$this->ColsNames[3]];
                echo '</div>';
                echo '</a>';

            }
            echo '</div>';
        }
        else
        {
             echo '
            <form action="CMS.php" method="post" ENCTYPE="multipart/form-data">
            <input type="file" name="Photo"/>
            <input type="text" name="Title"/>
            <textarea name="Description" class="ckeditor"></textarea>
            <div class="newsCenter">'.$this->AddButton.'<a class="newsOK" href="CMS.php?function=inforest">Powrót</a></div>
            </form>';

        }
    }
}

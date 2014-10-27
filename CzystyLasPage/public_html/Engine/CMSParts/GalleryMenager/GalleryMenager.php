<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GalleryMenager
 *
 * @author Lukasz
 */
class GalleryMenager extends DatabaseEditor {

    public function __construct($_colNames = array(), $_target) 
    {
        parent::__construct($_colNames, $_target, "gallery");

        $this->DeleteButton = '<button type="submit" name="function" value="delete_news" class="newsDeleteItem">-</button>';
    }

    public function Add($_params = array()) {
        
    }

    public function Delete($_param) {
        
    }

    public function Edit($_params = array()) {
        
    }

    public function Show() 
    {
        if(isset($_GET['Id']))
        {
            $q = "SELECT * FROM `gallery` WHERE Id = ".$_GET['Id'];
            $ins = mysql_query($q);
            
            $print = mysql_fetch_array($ins);
            
            echo '<div class="galleryContainer">';
            echo '<input type="text" hidden="true" name="Id" value="'. $print['Id'].'">';
            echo '<input type="text" name="Id" value="'. $print['Title'].'">';
                echo '<div class="editorContainer">';
                     echo '<textarea name="Description">'.$print['Description'].'</textarea>';
                echo '</div>';
            
            echo '<div class="imagesContainer">';
            $q = "SELECT * FROM `images` WHERE `GalleryId` = ".$_GET['Id'];
            $ins = mysql_query($q);

            while ($print = mysql_fetch_array($ins))
            {
                $url = "./Data/Images/".$print['Name'];
                echo '<div class="galleryImage" style="background-image: url('.$url.');"></div>';
            }
            echo '<a class="galleryImage" id="addImage">+</a>';
            echo '</div>';
        echo '</div>';
        }
        else
        {
            $q = "SELECT * FROM `gallery`";
            $ins = mysql_query($q);

            echo '<div class="galleryContainer">';
            while ($print = mysql_fetch_array($ins)) 
            {
                echo '<a href="CMS.php?function=gallery&Id='.$print['Id'].'">'. $print['Title']. $this->DeleteButton . '</a>';
            }
            echo '</div>';
        }
    }

}

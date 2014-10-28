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

    public function __construct($_colNames = array(), $_target) {
        parent::__construct($_colNames, $_target, "gallery");

        $this->DeleteButton = '<button type="submit" name="function" value="delete_news" class="newsDeleteItem">-</button>';
    }

    public function AddPhoto($_param, $galleryId) {
        echo count($_param['size']);

        for ($i = 0; $i < count($_param['size']); ++$i) {
            move_uploaded_file($_param['tmp_name'][$i], "Data/Images/" . $_param['name'][$i]);
            $q = "INSERT INTO `czysty-las-database`.`images` (`Id`, `Name`, `GalleryId`) VALUES (NULL, '" . $_param['name'][$i] . "', '$galleryId');";
            $ins = mysql_query($q);
        }
    }

    public function Add($_params = array()) {
        $today = date("m.d.y");
        $userid = $_SESSION['user']->GetUserId();
        $q = "INSERT INTO `czysty-las-database`.`gallery` (`Id`, `Title`, `Description`, `Date`, `UserId`) VALUES (NULL, '$_params[0]', '????', '$today', '$userid')";
        $ins = mysql_query($q);
    }

    public function Delete($_param) {
        
    }

    public function Edit($_params = array()) {
        $q = "UPDATE `czysty-las-database`.`gallery` SET `Title` = '$_params[1]', `Description` = '$_params[2]', `Date` = '2014-10-09' WHERE `gallery`.`Id` = " . $_params[0];
        $ins = mysql_query($q);
    }

    public function Show() {
        if (isset($_GET['Id'])) {

            $q = "SELECT * FROM `gallery` WHERE Id = " . $_GET['Id'];
            $ins = mysql_query($q);

            $print = mysql_fetch_array($ins);
            $galleryId = $print['Id'];
            echo '<div class="galleryContainer">';
            if(!isset($_GET['add']))echo '<form method="post" action="CMS.php">';
            echo '<input type="text" hidden="true" name="Id" value="' . $galleryId . '">';
            echo '<center><input type="text" name="Title" value="' . $print['Title'] . '"></center>';
            echo '<div class="editorContainer">';
            echo '<textarea name="Description" class="ckeditor">' . $print['Description'] . '</textarea>';
            echo '</div>';

            echo '<div class="imagesContainer">';
            $q = "SELECT * FROM `images` WHERE `GalleryId` = " . $_GET['Id'];
            $ins = mysql_query($q);

            while ($print = mysql_fetch_array($ins)) {
                $url = "./Data/Images/" . $print['Name'];
                echo '<div class="galleryImage" style="background-image: url(' . $url . ');"></div>';
            }
            if (isset($_GET['add'])) {
                echo '<form method="post" enctype="multipart/form-data" action="' . $this->Target . '">
                        <fieldset>
                          <legend>Prześlij pliki</legend>
                          <label>Dodaj pliki:';
                echo '<input type="text" hidden="true" name="Id" value="' . $galleryId . '">';
                echo '<input type="file" multiple name="files[]">
                          </label><br>
                          <input type="submit" name="function" value="add_photos">
                        </fieldset>
                      </form>';
            } else {
                echo '<a class="galleryImage" id="addImage" href="CMS.php?function=gallery&Id=' . $_GET['Id'] . '&add=true">+</a>';
            }
            echo '</div>';
            echo '<div class="mainButtons"> <center>';
            echo '<button class="newsOK" type="submit" name="function" value="edit_gallery">Zapisz</button>';
            echo '<a class="newsOK" href="CMS.php?function=gallery">Powrót</a>';
            echo '</center></div>';
            if(!isset($_GET['add'])) echo '</form>';
            echo '</div>';
        } else {
            $q = "SELECT * FROM `gallery`";
            $ins = mysql_query($q);

            echo '<div class="galleryContainer">';
            if (isset($_GET['new'])) {
                echo '<form method="POST" action="' . $this->Target . '">';
                echo '<input type="text" name="Title">';
                echo '<input type="submit" name="function" value="add_gallery">';
                echo '</form>';
            } else {
                echo '<div class="mainButtons"> <center>';
                echo '<a class="newsOK" href="CMS.php?function=gallery&new=true">Dodaj</a>';
                echo '</center></div>';
            }
            while ($print = mysql_fetch_array($ins)) {
                echo '<a class ="galleryLink" href="CMS.php?function=gallery&Id=' . $print['Id'] . '">' . $print['Title'] . $this->DeleteButton . '</a>';
            }
            echo '</div>';
        }
    }

}

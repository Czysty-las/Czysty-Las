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
class InForestMenager extends DatabaseEditor {

    public function __construct($_colNames = array(), $_target) {
        parent::__construct($_colNames, $_target, 'inforest');

        $this->DeleteButton = '<button type="submit" name="function" value="delete_inforest" class="newsDeleteItem">-</button>';
        $this->AddButton = '<button type="submit" name="function" value="add_inforest" class="newsOK">OK</button>';
        $this->EditButton = '<button type="submit" name="function" value="edit_inforest" class="newsOK">OK</button>';
    }

    public function Add($_params = array()) {
        $q = "INSERT INTO `czysty-las-database`.`images` (`Id`, `Name`) VALUES (NULL, '$_params[3]')";
        $ins = mysql_query($q);

        move_uploaded_file($_params[0], "Data/Images/" . $_params[3]);

        $id = mysql_insert_id();
        $q = "INSERT INTO `czysty-las-database`.`inforest` (`Id`, `Photo`, `Title`, `Description`) VALUES (NULL, '$id', '$_params[1]', '$_params[2]')";
        $ins = mysql_query($q);
    }

    public function Delete($_param) {
        $q = "SELECT `Photo` FROM `inforest` WHERE `Id` = " . $_param;
        $ins1 = mysql_query($q);
       /*
        * Serwer na, którym docelowo ma znajdować się strona nie czyta konstrukajci
        * mysql_fetch_array($ins1)['Name'];
        * Do poprawy w tym skrypcoe jak i UpCycling
        */

        $photoId = mysql_fetch_array($ins1)['Photo'];

        $q = "SELECT `Name` FROM `images` WHERE `Id` = " . $photoId;
        $ins1 = mysql_query($q);

        $photo = "./Data/Images/" . mysql_fetch_array($ins1)['Name'];
        echo $photo;
        unlink($photo);

        $q = "DELETE FROM `czysty-las-database`.`images` WHERE `images`.`Id` = " . $photoId;
        $ins = mysql_query($q);


        $q = "DELETE FROM `czysty-las-database`.`inforest` WHERE `inforest`.`Id` = " . $_param;
        $ins = mysql_query($q);
    }

    public function Edit($_params = array()) {
        $q = "SELECT `Photo` FROM `inforest` WHERE `Id` = " . $_params[0];
        $ins1 = mysql_query($q);

        $q = "SELECT `Name` FROM `images` WHERE `Id` = " . mysql_fetch_array($ins1)['Photo'];
        $ins1 = mysql_query($q);

        $photo = "./Data/Images/" . mysql_fetch_array($ins1)['Name'];
        echo $photo;
        echo $_params[1]['tmp_name'];

        if ($_params[1]['tmp_name'] != NULL) {

            unlink($photo);

            move_uploaded_file($_params[1]['tmp_name'], "Data/Images/" . $_params[1]['name']);
            //    echo 'YES!';
            echo $_params[1]['name'];
            $q = "INSERT INTO `czysty-las-database`.`images` (`Id`, `Name`, `GalleryId`) VALUES (NULL, '" . $_params[1]['name'] . "', '0')";
            $ins = mysql_query($q);

            $q = "UPDATE `czysty-las-database`.`inforest` SET `Photo` = '" . mysql_insert_id() . "', `Title` = '$_params[2]', `Description` = '$_params[3]' WHERE `inforest`.`Id` = " . $_params[0];
        } else {
            $q = "UPDATE `czysty-las-database`.`inforest` SET `Title` = '$_params[2]', `Description` = '$_params[3]' WHERE `inforest`.`Id` = " . $_params[0];
        }

        $ins = mysql_query($q);
    }

    public function Show() {

        if (!isset($_GET['add']) && !isset($_GET['Id'])) {
            $q = "SELECT * FROM `inforest`";
            $ins = mysql_query($q);
            echo '<div class="inforestContent">';
            echo '<a class="inforestAddItem" href="CMS.php?function=inforest&add=true">Dodaj</a>';

            while ($print = mysql_fetch_array($ins)) {
                $q = "SELECT * FROM `images` WHERE `Id` = " . $print[$this->ColsNames[1]];
                $ins1 = mysql_query($q);
                $print1 = mysql_fetch_array($ins1);


                echo '<a class="inforestItem" href="CMS.php?function=inforest&Id=' . $print['Id'] . '">';
                echo '<div class="inforestImageHolder">';
                echo '<form action="' . $this->Target . '" method="post">'
                . '<input type="text" hidden="true" name="' . $this->ColsNames[0] . '"  value="' . $print[$this->ColsNames[0]] . '"/>'; //  Przekazanie Id elementu do usunięcia przez post -> powrót do CMS.php -> Wywolanie odpowiedniej metody
                echo $this->DeleteButton;
                echo '</form>';

                echo '<img class="inforesrImage" src="./Data/Images/' . $print1['Name'] . '" href="sadas">';
                echo '</div>';
                echo '<div class="inforestTopicHolder">';
                echo '<p>' . $print[$this->ColsNames[2]] . '<p>';
                echo '</div>';
                echo '<div class="inforestDiscriptionHolder">';
                echo $print[$this->ColsNames[3]];
                echo '</div>';
                echo '</a>';
            }
            echo '</div>';
        } else {
            if (isset($_GET['Id'])) {
                $id = $_GET['Id'];
            } else {
                $id = 0;
            }

            if ($id == 0) {
                echo '
                <form action="' . $this->Target . '" method="post" ENCTYPE="multipart/form-data">
                <input type="file" name="Photo"/>
                <input type="text" name="Title"/>
                <textarea name="Description" class="ckeditor"></textarea>
                <div class="newsCenter">' . $this->AddButton . '<a class="newsOK" href="CMS.php?function=inforest">Powrót</a></div>
                </form>';
            } else {
                $q = "SELECT * FROM `inforest` WHERE `Id` = " . $id;
                $Edit = mysql_query($q);
                $EditPrint = mysql_fetch_array($Edit);
                echo '
                    <form action="' . $this->Target . '" method="post" ENCTYPE="multipart/form-data">
                    <input hidden="true" type="text" name="Id" value="' . $EditPrint['Id'] . '"/>
                    <input hidden="true" type="text" name="Photo" value="' . $EditPrint['Photo'] . '"/>    
                    <input type="file" name="Photo"/>
                    <input type="text" name="Title" value="' . $EditPrint['Title'] . '"/>
                    <textarea name="Description" class="ckeditor">' . $EditPrint['Description'] . '</textarea>
                    <div class="newsCenter">' . $this->EditButton . '<a class="newsOK" href="CMS.php?function=inforest">Powrót</a></div>
                    </form>';
            }
        }
    }

}

﻿<?php
/*
 * Doinkludowanie odpowienich plików php.
 */
include './CMSParts/include.php';
session_start();

$db = new Database('127.0.0.1', 'root', '', 'czysty-las-database');

/*
 * Jeżeli wysłany zostął POST skrypt sprawdza jaka funkcja została wybrana.
 * 
 * W przyszłości nastapi pewnie reorganizacja. 
 *  
 */

if (!empty($_POST['function'])) {
    switch ($_POST['function']) {
        
        case 'contact_save':
            $_SESSION['config']->ConfigContact()->Save(array(
                $_POST['boss'],                 // 0
                $_POST['bossPhone'],            // 1
                $_POST['veBoss'],               // 2
                $_POST['veBossPhone'],          // 3
                $_POST['fb'],                   // 4
                $_POST['email'],                // 5
                ));
            header('Location: CMS.php?function=config');
            break;
        /**
         * Sekcja zadań.
         */
        case 'done_task':
            $_SESSION['tasks']->Done($_POST['Id']);
            if ($_POST['profile'])
                header('Location: CMS.php?function=profile');
            else
                header('Location: CMS.php?function=tasks');
            break;
        case 'delete_task':
            $_SESSION['tasks']->Delete($_POST['Id']);
            header('Location: CMS.php?function=tasks');
            break;
        case 'clear_task':
            $_SESSION['tasks']->DeleteDone();
            header('Location: CMS.php?function=tasks');
            break;
        case 'add_task':
            $_SESSION['tasks']->Add(array(
                $_POST['UserId'],
                $_POST['Description']
                ));
            header('Location: CMS.php?function=tasks');
            break;
        /**
         * Sekcja profilu
         */
        case 'edit_profile':
            $photoTmpName = '';
            $photoName = '';

            if (isset($_FILES['Photo'])) {
                $photoTmpName = $_FILES['Photo']['tmp_name'];
                $photoName = $_FILES['Photo']['name'];
                //    echo $photoName, $photoTmpName;
            }

            $_SESSION['profile']->Edit(array(
                $photoTmpName,                  //  0           
                $photoName,                     //  1          
                $_POST['Id'],                   //  2
                $_POST['Name'],                 //  3
                $_POST['Surname'],              //  4
                $_POST['Email'],                //  5
                $_POST['Login'],                //  6
                $_POST['Password'],             //  7
                $_POST['About'],                //  8
                $_POST['Password1']             //  9    
                ));
            header('Location: CMS.php?function=profile');  //  Odswieżenie strony. 
            break;
        case 'delete_profile':
            $_SESSION['profile']->Delete($_POST['Id']);
            header('Location: CMS.php?function=inforest');  //  Odswieżenie strony.                
            break;
        /**
         * Sekcja galerii
         */
        case 'add_gallery':
            $_SESSION['gallery']->Add(array(
                $_POST['Title']
                ));
            header('Location: CMS.php?function=gallery');  //  Odswieżenie strony. 
            break;
        case 'add_photos':
            $_SESSION['gallery']->AddPhoto(
                $_FILES['files'], 
                $_POST['Id']
                );
            header('Location: CMS.php?function=gallery&Id=' . $_POST['Id']);
            break;
        case 'delete_photo':
            $_SESSION['gallery']->DeletePhoto($_POST['Id']);
            header('Location: CMS.php?function=gallery&Id=' . $_POST['GalleryId']);
            break;
        case 'delete_gallery':
            $_SESSION['gallery']->Delete($_POST['Id']);
            header('Location: CMS.php?function=gallery');  //  Odswieżenie strony.                
            break;
        case 'edit_gallery':
            $_SESSION['gallery']->Edit(array(
                $_POST['Id'],
                $_POST['Title'],
                $_POST['Description']
                ));
            header('Location: CMS.php?function=gallery&Id=' . $_POST['Id']);  //  Odswieżenie strony.                
            break;
        /**
         * Sekcja w lesie
         */
        case 'add_inforest':
            $_SESSION['inforest']->Add(array(
                $_FILES['Photo']['tmp_name'],
                $_POST['Title'],
                $_POST['Description'],
                $_FILES['Photo']['name']
                ));
            header('Location: CMS.php?function=inforest');  //  Odswieżenie strony. 
            break;
        case 'delete_inforest':
            $_SESSION['inforest']->Delete($_POST['Id']);
            header('Location: CMS.php?function=inforest');  //  Odswieżenie strony.                
            break;
        case 'edit_inforest':
            $_SESSION['inforest']->Edit(array(
                $_POST['Id'],
                $_FILES['Photo'],
                $_POST['Title'],
                $_POST['Description']
                ));
            header('Location: CMS.php?function=inforest');  //  Odswieżenie strony.                
            break;
        /**
         * Sekcja Upcyclingu
         */
        case 'add_upcycling':
            $_SESSION['upcycling']->Add(array(
                $_FILES['Photo']['tmp_name'],
                $_POST['Title'],
                $_POST['Description'],
                $_FILES['Photo']['name']
                ));
            header('Location: CMS.php?function=upcycling');  //  Odswieżenie strony. 
            break;
        case 'delete_upcycling':
            $_SESSION['upcycling']->Delete($_POST['Id']);
            echo 'Tak.';
            header('Location: CMS.php?function=upcycling');  //  Odswieżenie strony.                
            break;
        case 'edit_upcycling':
            $_SESSION['upcycling']->Edit(array(
                $_POST['Id'],
                $_FILES['Photo'],
                $_POST['Title'],
                $_POST['Description']
                ));
            header('Location: CMS.php?function=upcycling');  //  Odswieżenie strony.                
            break;
        /**
         * Sekcja kalendarium
         */
        case 'add_calendar':
            $_SESSION['calendar']->Add(array(
                $_POST['Date'],
                $_POST['Topic'],
                $_POST['Description']
                ));
            header('Location: CMS.php?function=calendar');  //  Odswieżenie strony.
            break;
        case 'delete_calendar':
            echo 'Tak.';
            $_SESSION['calendar']->Delete($_POST['Id']);
        //    header('Location: CMS.php?function=calendar');  //  Odswieżenie strony.                
            break;
        case 'edit_calendar':
            $_SESSION['calendar']->Edit(array(
                $_POST['Id'],
                $_POST['UserId'],
                $_POST['Date'],
                $_POST['Topic'],
                $_POST['Description']
                ));
            header('Location: CMS.php?function=calendar');  //  Odswieżenie strony.                
            break;
        /**
         * Sekcja newsów
         */
        case 'add_news':
            echo $_POST['UserId'];
            $_SESSION['news']->Add(array($_POST['Topic'], $_POST['Content']));
            header('Location: CMS.php?function=news');  //  Odswieżenie strony.
            break;
        case 'delete_news':
            $_SESSION['news']->Delete($_POST['Id']);
            header('Location: CMS.php?function=news');  //  Odswieżenie strony.                
            break;
        case 'edit_news':
            $_SESSION['news']->Edit(array(
                $_POST['Id'],
                $_POST['UserId'],
                $_POST['Topic'],
                $_POST['Content']
                ));
            header('Location: CMS.php?function=news');  //  Odswieżenie strony.                
            break;
        /**
         * Sekcja urzytkownikaów.
         */
        case 'add_user':
            echo $_POST['function'];
            $_SESSION['users']->Add(array(
                $_POST['Name'],
                $_POST['Surname'],
                $_POST['Email'],
                $_POST['Rights'],
                $_POST['Login'],
                $_POST['Password']
                ));
            header('Location: CMS.php?function=users');  //  Odswieżenie strony.
            break;
        case 'delete_user':
            $_SESSION['users']->Delete($_POST['Id']);
            header('Location: CMS.php?function=users');  //  Odswieżenie strony.                
            break;
        case 'edit_user':
            $_SESSION['users']->Edit(array(
                $_POST['Id'], 
                $_POST['Name'],
                $_POST['Surname'],
                $_POST['Email'],
                $_POST['Rights'],
                $_POST['Login'],
                $_POST['Password']
                ));
            header('Location: CMS.php?function=users');  //  Odswieżenie strony.
            break;
    }
} else {
    /*
     * Generacja interfejsu urzytkownika.
     * Odpowiadającego za zarządzanie urzotkownikami. 
     */

    if (isset($_SESSION['user'])) {    //  Sprawdzenie zalogowanie urzytkownika. 
        echo '<html>'
        . '<head>';
        include './CMSParts/Head.html';

        if (isset($_GET['function'])) {
            switch ($_GET['function']) {
                case "news":
                    echo "        
                                <script>
                                    CKEDITOR.config.height = '375px';
                                    CKEDITOR.config.resize_enabled = false;
                                </script>
                                ";
                    break;
                case "upcycling":
                case "inforest":
                    echo "        
                                <script>
                                    CKEDITOR.config.height = '500px';
                                    CKEDITOR.config.resize_enabled = false;
                                </script>
                                ";
                    break;
                case "edit_profile":
                    echo "        
                                <script>
                                    CKEDITOR.config.height = '450px';
                                    CKEDITOR.config.resize_enabled = false;
                                </script>
                                ";
                    break;
                case "gallery":
                    echo "        
                                <script>
                                    CKEDITOR.config.height = '450px';
                                    CKEDITOR.config.resize_enabled = false;
                                </script>
                                ";
                    break;
            }
        }

        echo '</head>';
        echo '<body>';

        echo '<div class="mainContainer">';
        echo '<div class="label">
                        <div class="titleDivision">
                            <div class="titleContainer">
                                <p class="pageTitles" id="CMSname">Content menagment system</p>
                            </div>
                        </div>
                        <div class="titleDivision">
                            <a id="home" href="CMS.php?function=menu"></a>
                        </div>
                        <div class="titleDivision">';
        UserMenu($_SESSION['user']->GetUserName());
        echo '
                        </div>    
                    </div>
                    ';

        echo ' <div class="Content">';
        if (isset($_GET['function'])) {
            switch ($_GET['function']) {
                case 'config':
                    $_SESSION['config']->GenerateHTML();
                    break;
                case 'upcycling':
                    $_SESSION['upcycling']->Show();
                    break;
                case "gallery":
                    $_SESSION['gallery']->Show();
                    break;
                case "tasks":
                    $_SESSION['tasks']->Show();
                    break;
                case "profile":
                    $_SESSION['profile']->Show();
                    break;
                case 'edit_profile':
                    $_SESSION['profile']->EditProfile();
                    break;
                case "news":
                    $_SESSION['news']->Show();
                    break;
                case "users":
                    $_SESSION['users']->Show();
                    break;
                case 'calendar':
                    $_SESSION['calendar']->Show();
                    break;
                case "inforest":
                    $_SESSION['inforest']->Show();
                    break;
                case "logoff":
                    session_destroy();
                    header('Location: login.php');
                    break;
                case "menu":
                    include '../Engine/CMSParts/Options.html';
                    break;
            }
        }
        echo '</div>';
        echo '</div>';
        echo '</body>';
        echo '</htam>';
    } else {
        echo'Aby uzyskać dostęp zakoguj się. <a href="../Engine/login.php">Logowanie</a>';
    }
}
?>

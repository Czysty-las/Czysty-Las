<?php
/*
 * Doinkludowanie odpowienich plików php.
 */
include '../Engine/CMSParts/Dadabase/DatabaseEditor.php';
include './CMSParts/Dadabase/Database.php';
include './CMSParts/News/NewsMenager.php';
include './CMSParts/UsersMenager/UsersMenager.php';
include './CMSParts/UsersMenager/User.php';

session_start();

    $db = new Database('127.0.0.1', 'root', '', 'czysty-las-database');

    /*
     * Jeżeli wysłany zostął POST skrypt sprawdza jaka funkcja została wybrana.
     * 
     * W przyszłości nastapi pewnie reorganizacja. 
     *  
     */

    if(!empty($_POST['function']))
    {
        switch ($_POST['function'])
        {
            case 'add_user':
                echo $_POST['function'];
                $_SESSION['users']->Add(array($_POST['Name'], $_POST['Surname'], $_POST['Email'], $_POST['Rights'], $_POST['Login'], $_POST['Password']));
                header( 'Location: CMS.php?function=users' ) ;  //  Odswieżenie strony.
                break;
            case 'delete_user':
                $_SESSION['users']->Delete($_POST['Id']);
                header( 'Location: CMS.php?function=users' ) ;  //  Odswieżenie strony.                
                break;
            case 'edit_user':
                $_SESSION['users']->Edit(array($_POST['Id'], $_POST['Name'], $_POST['Surname'], $_POST['Email'], $_POST['Rights'], $_POST['Login'], $_POST['Password']));
                header( 'Location: CMS.php?function=users' ) ;  //  Odswieżenie strony.
                break;
        }
    }
     else
    {
         /*
          * Generacja interfejsu urzytkownika.
          * Odpowiadającego za zarządzanie urzotkownikami. 
          */
         
        if(isset($_SESSION['user']))    //  Sprawdzenie zalogowanie urzytkownika. 
        {
        echo '<html>'
                . '<head>';
                include './CMSParts/Head.html';
            echo '</head>';
            echo '<body>';

            echo '<div class="mainContainer">';
            echo '        
            <div class="mainContainer">
                    <div class="label">
                        <div class="titleDivision">
                            <div class="titleContainer">
                                <p class="pageTitles" id="CMSname">Content menagment system</p>
                            </div>
                        </div>
                        <div class="titleDivision">
                            <div class="titleContainer" id="pageTitle">
                                <p class="pageTitles">Czysty las</p>
                            </div>    
                        </div>
                        <div class="titleDivision">
                            <div class="userMenu">
                                <div class="userName"><p class="pageTitles">'.$_SESSION['user']->GetUserName().'</p></div>
                                <div class="userOption"><a class="pageTitles">Profil</a></div>
                                <div class="userOption"><a class="pageTitles">Zadania</a></div>
                                <div class="userOption"><a class="pageTitles" href="CMS.php?function=logoff">Wyloguj</a></div>
                            </div>
                        </div>    
                    </div>
                    ';
            echo ' <div class="Content">';
            if(isset($_GET['function']))
            {
                switch ($_GET['function'])
                {
                    case "news":
                        $_SESSION['news']->Show();
                        break;
                    case "users":
                        $_SESSION['users']->Show();
                        break;
                    case "logoff":
                        session_destroy();
                        header( 'Location: Index.php' ) ;
                        break;
                    case "menu":
                        echo '
                            <div class="optionBelt">
                                <div class="optionsTitle">Kontent</div><a class="option">News</a><a class="option">Kalendarium</a><a class="option">Galeria</a>
                            </div>
                            <div class="optionBelt">
                                <div class="optionsTitle">Zarządzaj</div><a class="option" href="CMS.php?function=users">Urzytkownicy</a><a class="option">Konfiguracja</a>                    
                            </div>';
                        break;
                }
            }
            echo '</div>';
            echo '</div>';
            echo '</body>';
        echo '</htam>';
        }
        else
        {
            echo'Aby uzyskać dostęp zakoguj się. <a href="../Engine/Index.php">Logowanie</a>';
        }
    }

?>

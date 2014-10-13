<?php
/*
 * Doinkludowanie odpowienich plików php.
 */
include './CMSParts/Dadabase/Database.php';
include './CMSParts/UsersMenager/UsersMenager.php';

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
        case 'add':
            $_SESSION['users']->Add(array($_POST['Name'], $_POST['Surname'], $_POST['Email'], $_POST['Rights'], $_POST['Login'], $_POST['Password']));
            break;
        case 'delete':
            $_SESSION['users']->Delete($_POST['Id']);
            break;
        case 'edit':
            $_SESSION['users']->Edit(array($_POST['Id'], $_POST['Name'], $_POST['Surname'], $_POST['Email'], $_POST['Rights'], $_POST['Login'], $_POST['Password']));
            break;
    }
       header( 'Location: CMS.php' ) ;  //  Odswieżenie strony.
}
 else
{
     /*
      * Generacja interfejsu urzytkownika.
      * Odpowiadającego za zarządzanie urzotkownikami. 
      */
     
    echo '<html>'
            . '<head>';
            include './CMSParts/Head.html';
        echo '</head>';
        echo '<body>';

        echo '<div class="mainContainer">';
            include './CMSParts/Cards.html';
                echo ' <div class="Content">';
                $_SESSION['users']->printUsers();
                echo '</div>';
            echo '</div>';
        echo '</body>';
    echo '</htam>';
}
?>

<?php

include './CMSParts/Dadabase/Database.php';
include './CMSParts/UsersMenager/UsersMenager.php';

session_start();

$db = new Database('127.0.0.1', 'root', '', 'czysty-las-database');
    
if(!empty($_POST['function']))
{
    switch ($_POST['function'])
    {
        case 'add':
            $_SESSION['users']->AddUser($_POST['Name'], $_POST['Surname'], $_POST['Email'], $_POST['Rights']);
            break;
        case 'delete':
            $_SESSION['users']->DeleteUser($_POST['Id']);
            break;
        case 'edit':
            $_SESSION['users']->EditUser($_POST['Id'], $_POST['Name'], $_POST['Surname'], $_POST['Email'], $_POST['Rights']);
            break;
    }
       header( 'Location: CMS.php' ) ;
}
 else
{
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

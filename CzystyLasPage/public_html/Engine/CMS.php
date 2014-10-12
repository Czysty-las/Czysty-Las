<?php

include './CMSParts/Dadabase/Database.php';
include './CMSParts/UsersMenager/UsersMenager.php';



if(empty($_SESSION['users']) && empty($_SESSION['database']))
{
    session_start();
    echo'skisłeś!';

    $_SESSION['database'] = new Database('127.0.0.1', 'root', '');
    $_SESSION['database']->SelectDatabase("czysty-las-database");
    $_SESSION['users'] = new UsersMenager($_SESSION['database']->SelectTable("users"));
}
/*
$_database = new Database('127.0.0.1', 'root', '');

$_database->SelectDatabase("czysty-las-database");

$users =  new UsersMenager($_database->SelectTable("users"));
*/
    
if(!empty($_POST['Name']))
{
    echo 'sad';
    $_SESSION['database']->AddUser($_POST['Name'], $_POST['Surname'], $_POST['Email'], $_POST['Rights']);
}
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

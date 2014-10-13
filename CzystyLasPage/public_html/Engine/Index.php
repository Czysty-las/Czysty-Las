<?php

/*
 * Skrypt w przyszłości ma odpowiadać za logowanie. 
 */

/*
 * Doinkludowanie odpowienich plików php.
 */

include './CMSParts/Dadabase/Database.php';
include './CMSParts/UsersMenager/UsersMenager.php';

session_start();    // Rozpoczęcie sesji. 
    
$_SESSION['users'] = new UsersMenager(array('Id', 'Name', 'Surname', 'Email', 'Rights', 'Login', 'Password'));    //  Utworzenie nowego Menadrzera urzytkowników.
$db = new Database('127.0.0.1', 'root', '', 'czysty-las-database');

if(isset($_POST['loginButton']))
{
    $loginRezultat = $_SESSION['users']->LogIn($_POST['login'], $_POST['password']);
    
    if($loginRezultat['Id'] > 0)
    {
        header( 'Location: CMS.php' ) ; //  Przełączenie do właściwego interfejsu zarządzania.
    }
    else
    {
         header( 'Location: Index.php' ) ;
    }
}
else
{
    include './CMSParts/LogIn.html';
}
?>
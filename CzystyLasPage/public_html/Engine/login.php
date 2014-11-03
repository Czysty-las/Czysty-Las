<?php

/*
 * Skrypt w przyszłości ma odpowiadać za logowanie. 
 */

/*
 * Doinkludowanie odpowienich plików php.
 */

include '../Engine/CMSParts/Dadabase/DatabaseEditor.php';
include './CMSParts/Dadabase/Database.php';
include './CMSParts/News/NewsMenager.php';
include './CMSParts/GalleryMenager/GalleryMenager.php';
include './CMSParts/CalendarMenager/CalendarMenager.php';
include './CMSParts/InForestMenager/InForestMenager.php';
include './CMSParts/TaskMenager/TaskMenager.php';
include './CMSParts/UsersMenager/UsersMenager.php';
include './CMSParts/UsersMenager/User.php';
include '../Engine/CMSParts/UsersMenager/ProfileMenager.php';
include './CMSParts/UpCyclingMenager/UpCyclingMenager.php';
include './CMSParts/FileMenagment/FileMenagment.php';
include './CMSParts/Prezentation/HTMLPrezentation.php';

include './CMSParts/ConfigMenager/ConfigMenager.php';
include './CMSParts/ConfigMenager/Contact.php';


session_start();    // Rozpoczęcie sesji. 
    
$_SESSION['users'] = new UsersMenager(array('Id', 'Name', 'Surname', 'Email', 'Rights', 'Login', 'Password'), 'CMS.php');    //  Utworzenie nowego Menadrzera urzytkowników.
$_SESSION['news'] = new NewsMenager(array('Id', 'UserId', 'Topic', 'Content', 'Date'), 'CMS.php');
$_SESSION['calendar'] = new CalendarMenager(array('Id', 'UserId', 'Date', 'Topic', 'Description'), 'CMS.php');
$_SESSION['inforest'] = new InForestMenager(array('Id', 'Photo', 'Title', 'Description'),'CMS.php');
$_SESSION['profile'] = new ProfileMenager(array('Id', 'Name', 'Surname', 'Email', 'Rights', 'Login', 'Password'), 'CMS.php');
$_SESSION['tasks'] = new TaskMenager(array('Id', 'UserId', 'Description', 'Status'), 'CMS.php');
$_SESSION['gallery'] = new GalleryMenager(array('Id', 'Title', 'Description', 'Date', 'UserId'), 'CMS.php');
$_SESSION['upcycling'] = new UpCyclingMenager(array('Id', 'Photo', 'Title', 'Description'),'CMS.php');
$_SESSION['config'] = new ConfigMenager("./Data/Config");

$db = new Database('127.0.0.1', 'root', '', 'czysty-las-database');

if(isset($_POST['loginButton']))
{
    $loginRezultat = $_SESSION['users']->LogIn($_POST['login'], $_POST['password']);
    
    if($loginRezultat['Id'] > 0)
    {
        $_SESSION['user'] = new User($loginRezultat['Id'], $loginRezultat['Name'], $loginRezultat['Surname'], $loginRezultat['Login'], $loginRezultat['Password'], $loginRezultat['Email'], $loginRezultat['Image'], $loginRezultat['About'] );
        header( 'Location: CMS.php?function=menu' ) ; //  Przełączenie do właściwego interfejsu zarządzania.
    }
    else
    {
         header( 'Location: login.php' ) ;
    }
}
else
{
    include './CMSParts/LogIn.html';
}
?>
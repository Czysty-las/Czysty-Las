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

    
$_SESSION['users'] = new UsersMenager();    //  Utworzenie nowego Menadrzera urzytkowników.

header( 'Location: CMS.php' ) ; //  Przełączenie do właściwego interfejsu zarządzania.

?>
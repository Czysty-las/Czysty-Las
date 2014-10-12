<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './CMSParts/Dadabase/Database.php';
include './CMSParts/UsersMenager/UsersMenager.php';

session_start();

    
$_SESSION['users'] = new UsersMenager();

header( 'Location: CMS.php' ) ;

?>
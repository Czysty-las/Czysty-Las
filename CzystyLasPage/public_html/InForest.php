<?php
//Zanaczniik początku strony
echo '<html>';
echo '<head>';
    //Dołaczenie nagłówka z osobnego pliku
    include './PageParts/head.html';
    //Styl wlaściwy dla podstrony
    echo'<link rel="stylesheet" type="text/css" href="Assets/Skyle/InForestStyle.css">';
echo '</head>';    
    //Znacznik ciała strony
     echo '<body>';
     //Dołaczenie banera z osobnego pliku
     include './PageParts/baner.html';
        //Znacznik głownego kontenera na kontent strony
        echo '<div class="container">';
           //Dłączenie dwuch navigacji 
           include './PageParts/pageNav.html';              // Nawigacja serwisu
           include './PageParts/socialNetworkNav.html';     // Nawigacja sieci społecznościwych.
           
           echo '  <div class="content">';
            include '../public_html/PageContentScripts/InForestScript.php';
           echo '</div>';
           
           if (isset($_GET['Id']))
                echo '<div class="footer"></div>';

           
        echo '</div>';
     echo '<body>';
echo '</html>';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

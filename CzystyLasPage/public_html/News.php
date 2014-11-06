<?php
//Zanaczniik początku strony
echo '<html>';
echo '<head>';
    //Dołaczenie nagłówka z osobnego pliku
    include './PageParts/head.html';
    //Styl wlaściwy dla podstrony
    echo'<link rel="stylesheet" type="text/css" href="Assets/Skyle/NewsStyle.css">';
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
            include '../public_html/PageContentScripts/NewsScript.php';
           echo '</div>';
           
           echo '<div class="footer"></div>';
        echo '</div>';
     echo '<body>';
echo '</html>';
?>

<?php

/*
 * Skrypt ten ma za zadanie wyświetlnić newsy na stronie. 
 */

include '../public_html/Engine/CMSParts/Dadabase/Database.php';

$database = new Database('127.0.0.1', 'root', '', 'czysty-las-database');

//  Składnie zapytania
        $q = 'SELECT * FROM news';
        $toPrint = mysql_query($q); //  Wysłanie zapytania.
        
        
        //  Pętla generaująca poszczególne wiersze reprezentujące dodanych urzytkowników.
        

        while($print = mysql_fetch_array($toPrint))
        {
            echo
            '
            <p class="title">'.$print['Topic'].'</p>
            <p class="news">'.$print['Content'].'</p>
            ';
            
        }
?>
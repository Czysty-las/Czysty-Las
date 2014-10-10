<?php

include './CMSParts/Dadabase/Database.php';

$_database = new Database('127.0.0.1', 'root', '');

echo '<html>'
        . '<head>';
        include './CMSParts/Head.html';
    echo '</head>';
    echo '<body>';

    echo '<div class="mainContainer">';
        include './CMSParts/Cards.html';
            echo ' <div class="Content">';
            echo '</div>';
        echo '</div>';
    echo '</body>';
echo '</htam>';

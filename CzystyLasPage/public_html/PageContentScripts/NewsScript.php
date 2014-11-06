<?php

/*
 * Skrypt ten ma za zadanie wyświetlnić newsy na stronie. 
 */
/*
include '../public_html/Engine/CMSParts/Dadabase/Database.php';
include '../public_html/PageContentScripts/ContentClass/NewsDisplayer.php';

$database = new Database('127.0.0.1', 'root', '', 'czysty-las-database');
*/

include './PageContentScripts/DataBaseConnect.php';

session_start();

//$_SESSION['News'];

//  Składnie zapytania
$q = 'SELECT * FROM `news` ORDER BY `news`.`Id` DESC';
$toPrint = mysql_query($q); //  Wysłanie zapytania.
//  Pętla generaująca poszczególne wiersze reprezentujące dodanych urzytkowników.

$pages =  $posts = 0;

$page;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else
    $page = 0;
//$News[][];

while ($print = mysql_fetch_array($toPrint)) {
  /*  echo
    '
            <p class="title">' . $print['Topic'] . '</p>
            <p class="news">' . $print['Content'] . '</p>
            ';*/
    
    $News[$pages][$posts++]=  new NewsDisplayer($print['Topic'], $print['Content']);
    
    if($posts == 10)
    {
        ++$pages;
        $posts = 0;
    }  
}
//echo $i.' '.$j;


    for($j = 0; $j < 10; ++$j){
        if($News[$page][$j] != NULL)
        {
            $News[$page][$j]->DisplayNews();
        }
        else {break;}
    }
    
    for($i = 0; $i <= $pages; ++$i){
        echo '<a href="News.php?page='.$i.'">'.($i+1).'</a>';
    }
?>
<?php

include './PageContentScripts/DataBaseConnect.php';
if (isset($_GET['Id'])) {

    $q = "SELECT * FROM `inforest` WHERE `Id` = " . $_GET['Id'];
    $ins = mysql_query($q);

    $print = mysql_fetch_array($ins);

    $q = "SELECT * FROM `images` WHERE `Id` = " . $print['Photo'];
    $ins1 = mysql_query($q);
    
    $print1 = mysql_fetch_array($ins1);

    echo '<div class="inforestItemDetails">';
    echo '<div class="title">' . $print['Title'] . '</div>';
    echo '<div class="inforesrImage" style=" background-image: url(./Engine/Data/Images/' . $print1['Name'] . ')"></div>';
    echo $print['Description'];
    echo '</div>';
} else {
    $q = "SELECT * FROM `inforest`";
    $ins = mysql_query($q);

    while ($print = mysql_fetch_array($ins)) {
        $q = "SELECT * FROM `images` WHERE `Id` = " . $print['Photo'];
        $ins1 = mysql_query($q);
        $print1 = mysql_fetch_array($ins1);

        echo '<a class="inforestItem" href="InForest.php?Id=' . $print['Id'] . '">';
        //  echo '<input type="text" hidden="true" name="Id"  value="' . $print['Id'] . '"/>'; //  Przekazanie Id elementu do usunięcia przez post -> powrót do CMS.php -> Wywolanie odpowiedniej metody

        echo '<div class="title">' . $print['Title'] . '</div>';
        echo '<div class="inforesrImage" style=" background-image: url(./Engine/Data/Images/' . $print1['Name'] . ')"></div>';

        //   echo '<p class="description">' . $print['Description'] . '</p>';
        if (strlen($print['Description']) < 300) {
            echo $print['Description'];
        } else {
            echo substr($print['Description'], 0, 347) . '...</p>';
        }
        echo '</a>';
    }
}
?>
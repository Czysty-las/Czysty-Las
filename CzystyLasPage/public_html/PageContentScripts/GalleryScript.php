<?php

include './PageContentScripts/DataBaseConnect.php';

if (isset($_GET['Id'])) {
    echo '<div class="imagesContainer">';
    $q = "SELECT * FROM `images` WHERE `GalleryId` = " . $_GET['Id'];
    $ins = mysql_query($q);

    while ($print = mysql_fetch_array($ins)) {
        $url = "./Engine/Data/Images/" . $print['Name'];
    //    echo '<form method="post" enctype="multipart/form-data" action="' . $this->Target . '">';
    //    echo '<input type="text" hidden="true" name="GalleryId" value="' . $galleryId . '">';
    //    echo '<input type="text" hidden="true" name="Id" value="' . $print['Id'] . '">';
        echo '<a class="galleryImage" style="background-image: url(' . $url . ');" href="'.$url.'" target="_blank">' /*. $this->DeletePhoto */. '</a>';
     //   echo '</form>';
    }
} else {
    $q = "SELECT * FROM `gallery`";
    $ins = mysql_query($q);


    while ($print = mysql_fetch_array($ins)) {
        echo '<a class ="galleryLink" href="Gallery.php?Id=' . $print['Id'] . '">' . $print['Title'] . '</a>';
    }
}
?>

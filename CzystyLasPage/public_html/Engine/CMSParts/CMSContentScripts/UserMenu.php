<?php

function UserMenu($_name) {
    echo '    
        <div class = "userMenu">
            <div class = "userName"><p class = "pageTitles">'.$_name.'</p></div>
            <div class = "userOption"><a class = "pageTitles">Profil</a></div>
            <div class = "userOption"><a class = "pageTitles">Zadania</a></div>
            <div class = "userOption"><a class = "pageTitles" href = "CMS.php?function=logoff">Wyloguj</a></div>
        </div>
        ';
}
?>


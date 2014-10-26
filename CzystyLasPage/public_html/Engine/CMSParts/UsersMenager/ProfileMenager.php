<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfileMenager
 *
 * @author Lukasz
 */
class ProfileMenager extends DatabaseEditor 
{
    private $doneButton = '<button type="submit" class="taskSet" value="done_task">Wykonane</button>';
    
    public function __construct($_colNames = array(), $_target) 
    {
        parent::__construct($_colNames, $_target, "profile");
    }

    public function Add($_params = array()) {
        
    }

    public function Delete($_param) {
        
    }

    public function Edit($_params = array()) {
        
    }

    public function Show()
    {
        echo '<div class="profileContainer">';
        echo '<div class="prfileDisplay">';
        echo '<a class="profileImage"><img src="./Data/Images/'.$_SESSION['user']->GetUserImage().'"/></a>';
        echo '<p>'.$_SESSION['user']->GetUserName().'</p>';
        echo '<p>'.$_SESSION['user']->GetUserLogin().'</p>';
        echo '</div>';
        echo '<div class="contentContainer">';
        echo '<p>O mnie</p>';
        echo '<p>'.$_SESSION['user']->GetUserAbaut().'</p>';
        echo '</div>';
        echo '<div class="contentContainer">';
        echo '<p>Zadania</p>';
    //    echo '<div class="userTask">';
        
            $q = "SELECT * FROM `tasks` WHERE `UserId` = ".$_SESSION['user']->GetUserId()." AND `Status` = 0 ORDER BY `Id` ASC";
        //    echo $q;
            $ins = mysql_query($q);

            while($print =  mysql_fetch_array($ins))
            {
                $q = "SELECT `Name`, `Surname` FROM `users` WHERE `Id` = ".$print['UserId'];
            //    echo $q;
                $ins1 = mysql_query($q);

                $print1 = mysql_fetch_array($ins1);

            //    echo '<form action="' . $this->Target . '" method="post">';    
            //    echo '<div class="taskOwner">'.$print1['Name'].' '.$print1['Surname'].'</div>';

            //    echo '</select>';
                echo '<div type="text" class="taskDescription">'.$print['Description'].'</div>';
                echo $this->doneButton;
            //    echo '</form>';
            }

        echo '</div>';
        echo '</div>';
    //    echo '</div>';
        
        
    }

//put your code here
}

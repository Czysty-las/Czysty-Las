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
    private $doneButton = '<button type="submit" class="taskSet" name ="function" value="done_task">Wykonane</button>';
    
    public function __construct($_colNames = array(), $_target) 
    {
        parent::__construct($_colNames, $_target, "profile");
        $this->EditButton = '<button type="submit" class="taskSet" name ="function" value="edit_profile">Zapisz</button>';
    }

    public function Add($_params = array()) {
        
    }

    public function Delete($_param) {
        
    }

    public function Edit($_params = array()) 
    {
        $image = ''; $password = $_SESSION['user']->GetUserPassword();
        
        if($_params[7] == $_params[9])
        {
            $password = $_params[7];
        }
        
        if($_params[0] !='' || $_params[1] != '')
        {
            $photo = "./Data/Images/".$_SESSION['user']->GetUserImage();
            echo $photo;
            unlink($photo);
            
            move_uploaded_file($_params[0],"Data/Images/".$_params[1]);
            $_SESSION['user']->SetUserImage($_params[1]);
            
            $image = $_params[1];
        }
        else 
        {
            $image = $_SESSION['user']->GetUserImage();
        }
        
        $q = "UPDATE `czysty-las-database`.`users` SET "
                . "`Name` = '$_params[3]', "
                . "`Surname` = '$_params[4]', "
                . "`Email` = '$_params[5]', "
                . "`Login` = '$_params[6]', "
                . "`Password` = '$password', "
                . "`Image` = '$image', "
                . "`About` = '$_params[8]' "
                . "WHERE `users`.`Id` = ".$_params[2];
               
        $ins = mysql_query($q);
        
        if($ins)
        {
            $_SESSION['user']->SetName($_params[3]);
            $_SESSION['user']->SetSurame($_params[4]);
            $_SESSION['user']->SetUserAbaut($_params[8]);
            $_SESSION['user']->SetUserMail($_params[5]);
            $_SESSION['user']->SetUserLogin($_params[6]);
        }
        
        echo $q;
    }
    
    public function EditProfile() 
    {
        echo '<div class="profileContainer">';
        echo '<div class="prfileDisplay">';
        echo '<form action="' . $this->Target . '" method="post" ENCTYPE="multipart/form-data">';    
        echo '<a class="profileImage">'
           . '<img src="./Data/Images/'.$_SESSION['user']->GetUserImage().'"/></a>';
        echo '<input type="file" name="Photo"/>';
        echo '<input type="text" hidden="true" name="Id" value="'.$_SESSION['user']->GetUserId().'">';
        echo '<input type="text" name="Name" value="'.$_SESSION['user']->GetName().'">';
        echo '<input type="text" name="Surname" value="'.$_SESSION['user']->GetSurname().'">';
        echo '<input type="text" name="Email" value="'.$_SESSION['user']->GetUserMail().'">';
        echo '<input type="text" name="Login" value="'.$_SESSION['user']->GetUserLogin().'">';
        echo '<input type="password" name="Password" value="'.$_SESSION['user']->GetUserPassword().'">';
        echo '<input type="password" name="Password1">';
        echo $this->EditButton;
        echo '</div>';
        echo '<div class="editorContainer">';
        echo '<textarea name="About" class="ckeditor">'.$_SESSION['user']->GetUserAbaut().'</textarea>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
    
    public function Show()
    {
        echo '<div class="profileContainer">';
        echo '<div class="prfileDisplay">';
        echo '<a class="profileImage"><img src="./Data/Images/'.$_SESSION['user']->GetUserImage().'"/></a>';
        echo '<p>'.$_SESSION['user']->GetUserName().'</p>';
        echo '<p>'.$_SESSION['user']->GetUserLogin().'</p>';
        echo '<p>'.$_SESSION['user']->GetUserMail().'</p>'; 
        echo '<a class="profileEdit" href="CMS.php?function=edit_profile">Edytuj profil</a>';
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

                echo '<form action="' . $this->Target . '" method="post">';    
                echo '<input type="text" hidden="true" name="Id" value="'.$print['Id'].'">';
                echo '<input type="text" hidden="true" name="profile" value="yes">';
                echo '<div type="text" class="taskDescription">'.$print['Description'].'</div>';
                echo $this->doneButton;
                echo '</form>';
            }

        echo '</div>';
        echo '</div>';
    //    echo '</div>';
        
        
    }

//put your code here
}

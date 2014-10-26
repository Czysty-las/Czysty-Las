<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TaskMenager
 *
 * @author Lukasz
 */
class TaskMenager extends DatabaseEditor
{
    private $doneButton = '<button type="submit" class="taskSet" value="done_task">Wykonane</button>';
        
    public function __construct($_colNames = array(), $_target) {
        parent::__construct($_colNames, $_target, "tasks");
    }

    public function Add($_params = array()) {
        
    }

    public function Delete($_param) {
        
    }

    public function Edit($_params = array()) {
        
    }

    public function Show() 
    {
        echo '<div class="taskContent">';
        echo '<div class="taskAdd">';
        echo '<form action="' . $this->Target . '" method="post">';    
        echo '<select class="taskOwner">';
        
        $q = "SELECT `Id`, `Name`, `Surname` FROM `czysty-las-database`.`users`";
        $ins = mysql_query($q);
        
        while($print =  mysql_fetch_array($ins))
        {
            echo '<option value="'.$print['Id'].'">'.$print['Name'].' '.$print['Surname'].'</option>';            
        }
        
        echo '</select>';
        echo '<input type="text" class="taskDescription" name="Description" value="Co trzeba zrobić?">';
        echo '<button type="submit" class="taskSet" value="add_task">Zadaj</button>';
        echo '</form>';    
        echo '</div>';
        echo '<div class="taskInProgres">';
        
        $q = "SELECT * FROM `tasks` WHERE `Status` = 0";
        $ins = mysql_query($q);
        
        while($print =  mysql_fetch_array($ins))
        {
            $q = "SELECT `Name`, `Surname` FROM `users` WHERE `Id` = ".$print['UserId'];
        //    echo $q;
            $ins1 = mysql_query($q);
            
            $print1 = mysql_fetch_array($ins1);
            
        //    echo '<form action="' . $this->Target . '" method="post">';    
            echo '<div class="taskOwner">'.$print1['Name'].' '.$print1['Surname'].'</div>';

            echo '</select>';
            echo '<div type="text" class="taskDescription">'.$print['Description'].'</div>';
            echo '<button type="submit" class="taskSet" value="done_task">Wykonane</button>';
        //    echo '</form>';
        }

        echo '</div>';
        echo '<div class="taskInProgres">';
        echo '<button type="submit" class="clearDone" value="clear_task">Wyczyść wykonane</button>';
        $q = "SELECT * FROM `tasks` WHERE `Status` = 1";
        $ins = mysql_query($q);
        
        while($print =  mysql_fetch_array($ins))
        {
            $q = "SELECT `Name`, `Surname` FROM `users` WHERE `Id` = ".$print['UserId'];
        //    echo $q;
            $ins1 = mysql_query($q);
            
            $print1 = mysql_fetch_array($ins1);
            
        //    echo '<form action="' . $this->Target . '" method="post">';    
            echo '<div class="taskOwner">'.$print1['Name'].' '.$print1['Surname'].'</div>';

            echo '</select>';
            echo '<div type="text" class="taskDescription" id="taskDone">'.$print['Description'].'</div>';
        //    echo '<button type="submit" class="taskSet" value="done_task">Wykonane</button>';
        //    echo '</form>';

        }
        
        echo '</div>';
        echo '</div>';
    }

//put your code here
}

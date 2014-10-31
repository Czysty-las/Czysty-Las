<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CalendarMenager
 *
 * @author PC
 */
class CalendarMenager extends DatabaseEditor
{
    public function __construct($_colNames = array(), $_target) 
    {
        parent::__construct($_colNames, $_target, 'calendar');
        
        
    }

    public function Add($_params = array()) 
    {
        $uid = $_SESSION['user']->GetUserId();
        //echo $uid;
        $q = "INSERT INTO `czysty-las-database`.`calendar` (`Id`, `UserId`, `Date`, `Topic`, `Description`) VALUES (NULL, '$uid', '$_params[0]', '$_params[1]', '$date')";
        $ins = mysql_query($q);
    }

    public function Delete($_param) 
    {
        $q = "DELETE FROM `czysty-las-database`.`calendar` WHERE `news`.`Id` = '$_param'" ;
        $ins = mysql_query($q);
    }

    public function Edit($_params = array()) 
    {
        $q = "UPDATE `czysty-las-database`.`calendar` SET `UserId` = '$_params[1]', `Date` = '$_params[2]', `Topis` = '$_params[3]', 'Description'='$_params[4] WHERE `news`.`Id` = '$_params[0]'";
        $ins = mysql_query($q); 
    }

    public function Show() 
    {
        $_id = 0;
        
        $q = 'SELECT * FROM `calendar` ORDER BY `calendar`.`Id` DESC';
        $rekordy = mysql_query($q);
        
        if (isset($_GET['id'])) 
        {
            $_id = $_GET['id'];
        }

        echo '<div class="calendarList">';   
        
        if(isset($_GET['add']) || $_id > 0)
        {
            if($_id > 0) 
            {
                echo 'mama';
                echo '<form action="' . $this->Target . '" method="post">';    
            }
            else     
            {                
                echo '<form action="' . $this->Target . '" method="post">';
                echo '<input type="text" name="' . $this->ColsNames[3] . '" value="Temat" class="calendarItem" id="teopicInput"/>';                
            }
        }
        
        while ($print = mysql_fetch_array($rekordy)) 
        {
            
            echo '<input type="text" hidden="true" name="' . $this->ColsNames[0] . '"  value="' . $print[$this->ColsNames[0]] . '"/>'; //  Przekazanie Id elementu do usunięcia przez post -> powrót do CMS.php -> Wywolanie odpowiedniej metody
            echo '<a class="newsItem" href="CMS.php?function=calender&id=' . $print[$this->ColsNames[0]] . '">' . $print[$this->ColsNames[3]] . $this->DeleteButton .'</a>';
        }
        
        echo '</div>';   //calendarList         
                
        echo '<div class="calendarRightSite">';
        
        if (isset($_GET['add']) || $_id > 0)  
        {
            if($_id > 0)    //  Edit
            {
                
            }
            else            //  Add
            {
                
            }
        }
        else
        {
            echo '<a class="calendarAddButton" href="CMS.php?function=calender&add=true">Dodaj</a>';
        }
        
        echo '</div>';   //calendarRightSite
       
    }

//put your code here
}

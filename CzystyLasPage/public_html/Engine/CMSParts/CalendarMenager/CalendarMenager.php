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
        
    }

//put your code here
}

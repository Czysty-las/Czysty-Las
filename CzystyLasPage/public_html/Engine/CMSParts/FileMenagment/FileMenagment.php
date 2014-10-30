<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Lukasz
 */
interface FileMenagment {
    
    public function LoadFroFile($param);
    public function ReadLine();
    public function SaveLine($_line);
    public function SaveToFile($param);
    //put your code here
}

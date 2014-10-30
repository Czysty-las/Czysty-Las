<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactMenager
 *
 * @author Lukasz
 */
class ConfigMenager implements FileMenagment, HTMLPrezentation{
    
    private $FILE;
    
    public function __construct($path) {
        $this->FILE = fopen($path, "w+");
    }
    public function LoadFroFile($param) {
        
    }

    public function ReadLine() {
        if(!feof($this->FILE)){
            return fgets($this->FILE);
        }
    }

    public function SaveLine($_line) {
        
    }

    public function SaveToFile($param) {
        
    }

    public function GenerateHTML() {
        echo '<div class="configContainer">';
        echo '<form>';
        echo '</form>';
        echo '</div>';
    }

//put your code here
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author Lukasz
 */
class Contact implements FileMenagment, HTMLPrezentation {

    private $content = array();

    public function __construct($path) {

        if (file_exists($path)) {
            //    echo "Im born! ".$path." ";

            $configFile = fopen($path, "r+");

            if ($configFile) {
                $i = 0;
                while (!feof($configFile)) {
                    $fileLine = explode("=", fgets($configFile));
                    $this->content[$i][0] = $fileLine[0];
                    $this->content[$i][1] = $fileLine[1];
                    ++$i;
                }
                for ($j = 0; $j < $i; $j++) {
                    echo $this->content[$j][0] . " " . $this->content[$j][1] . "</br>";
                }
                echo $i;
            }
        }
    }

    public function LoadFroFile($param) {
        
    }

    public function ReadLine() {
        
    }

    public function SaveLine($_line) {
        
    }

    public function SaveToFile($param) {
        
    }

    public function GenerateHTML() {
        echo '<form>';
        echo '</form>';
    }

//put your code here
}

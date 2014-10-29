<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsDisplayer
 *
 * @author Lukasz
 */
class NewsDisplayer {
    private $Title;
    private $Content;
    
    public function __construct($_title, $_content) {
        $this->Title = $_title;
        $this->Content = $_content;
    }
    
    public function DisplayNews() {
        echo  '<p class="title">'.$this->Title.'</p>';
        echo '<p class="news">'.$this->Content.'</p>';
    }
    //put your code here
}

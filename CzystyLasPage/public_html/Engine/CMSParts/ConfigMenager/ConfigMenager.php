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
class ConfigMenager implements HTMLPrezentation{
    private $contact;
    
    public function __construct($path) {
        
        $configfiles = scandir($path);
        
        $i = 0;
        while (isset($configfiles[$i]))
        {
            switch ($configfiles[$i])
            {
                case "contact.cf":
                    $this->contact = new Contact($path."/".$configfiles[$i]);
                    break;
            }
            $i++;
        }
    }

    public function GenerateHTML() {
        echo '<div class="configContainer">';
        echo '<form>';
        echo '</form>';
        echo '</div>';
    }

//put your code here
}

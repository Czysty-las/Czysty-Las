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
class Contact implements HTMLPrezentation {

    private $content = array();
    private $path = '';

    //  private $

    public function __construct($path) {

        $this->path = $path;
        //    $this->Load();
    }
    
    public function GenerateHTML() {
        echo '<form action="CMS.php" method="post">';
        echo '<div class="contactContainer">';
        echo '<table>';
        echo '<td colspan="2">Dane kontaktowe strony</td>';
        for ($i = 0; $i < count($this->content); $i++) {
            echo '<tr>';
            switch ($this->content[$i][0]) {
                case "boss":
                    echo '<td>Preses</td>';
                    echo '<td><input type="text" name="boss" value="' . $this->content[$i][1] . '"></td>';
                    break;
                case "bossPhone":
                    echo '<td>Numer telefonu prezesa</td>';
                    echo '<td><input type="text" name="bossPhone" value="' . $this->content[$i][1] . '"></td>';
                    break;
                case "veBoss":
                    echo '<td>Vice prezes</td>';
                    echo '<td><input type="text" name="veBoss" value="' . $this->content[$i][1] . '"></td>';
                    break;
                case "veBossPhone":
                    echo '<td>Numer telefonu vice prezesa</td>';
                    echo '<td><input type="text" name="veBossPhone" value="' . $this->content[$i][1] . '"></td>';
                    break;
                case "fb":
                    echo '<td>Facebook</td>';
                    echo '<td><input type="text" name="fb" value="' . $this->content[$i][1] . '"></td>';
                    break;
                case "email":
                    echo '<td>Mejl</td>';
                    echo '<td><input type="text" name="email" value="' . $this->content[$i][1] . '"></td>';
                    break;
            }
            echo '</tr>';
        }
        echo '<tr>';
        echo '<td colspan="2"><button type="submit" name="function" value="contact_save">Zapisz</button></td>';
        echo '</td>';

        echo '</table>';
        echo '</div>';
        echo '</form>';
    }

    public function Load() {
        if (file_exists($this->path)) {
            //    echo "Im born! ".$path." ";

            $configFile = fopen($this->path, "r+");

            if ($configFile) {
                $i = 0;
                while (!feof($configFile)) {
                    $fileLine = explode("=", fgets($configFile));
                    $this->content[$i][0] = $fileLine[0];
                    $this->content[$i][1] = $fileLine[1];
                    ++$i;
                }
                /*    for ($j = 0; $j < $i; $j++) {
                  echo $this->content[$j][0] . " " . $this->content[$j][1] . "</br>";
                  }
                  echo $i; */
                fclose($configFile);   
            }
        }
    }

    public function Save($toSave = array()) {
        echo $this->path;
        $configFile = fopen($this->path, "w+");
        
        for ($i = 0; $i < count($this->content); $i++) {
            if ($i != 5)
                fwrite($configFile, $this->content[$i][0] . "=" . $toSave[$i] . "\n");
            else
                fwrite($configFile, $this->content[$i][0] . "=" . $toSave[$i]);
        }
        fclose($configFile);
    }

//put your code here
}

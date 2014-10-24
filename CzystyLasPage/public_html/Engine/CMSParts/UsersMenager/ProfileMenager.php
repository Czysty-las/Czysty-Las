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
    public function __construct($_colNames = array(), $_target) {
        parent::__construct($_colNames, $_target, "profile");
    }

    public function Add($_params = array()) {
        
    }

    public function Delete($_param) {
        
    }

    public function Edit($_params = array()) {
        
    }

    public function Show()
    {
        echo '<div class="profileContainer">';
        echo '<div class="prfileDisplay">';
        echo '<a class="profileImage"><img src="../../Assets/Images/cms/placeholder.jpg"/></a>';
        echo '<p>Joanna Dark</p>';
        echo '<p>JoaDar</p>';
        echo '</div>';
        echo '<div class="contentContainer">';
        echo '<p>O mnie</p>';
        echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin egestas tellus sed eleifend pretium. Sed molestie ipsum eget mauris pellentesque euismod. Fusce ullamcorper ligula nec tellus vehicula aliquet. Ut eros urna, sodales in dignissim id, lacinia at dolor. Aliquam ultricies ac ex ullamcorper semper. Nullam ipsum eros, viverra feugiat semper in, tempor ut lacus. Nulla ac nibh sed tellus feugiat tincidunt nec semper magna. In hac habitasse platea dictumst. Mauris ut imperdiet quam. Pellentesque malesuada mattis vulputate. Donec sit amet ante a purus auctor mattis in in nunc. Pellentesque molestie pulvinar bibendum. Vestibulum vel lacus mauris. Nam ac tortor felis. Ut risus nunc, feugiat non erat congue, placerat suscipit quam. Cras vestibulum venenatis interdum.</p>';
        echo '</div>';
        echo '<div class="contentContainer">';
        echo '<p>Zadania</p>';
        echo '<div class="userTask"></div>';
        echo '</div>';
        echo '</div>';
        
        
    }

//put your code here
}

<?php

/**
 * Description of DatabaseEditor
 *
 * @author Lukasz
 */
abstract class DatabaseEditor 
{
    protected $ColsNames = array();
    
    protected $Target;
    
    protected $DeleteButton;
    protected $AddButton;
    protected $EditButton;



    public function __construct($_colNames =  array(), $_target, $_section)
    {
        $this->ColsNames = $_colNames;
        $this->Target = $_target;
        
        $this->DeleteButton = '<button type="submit" name="function" value="delete_'.$_section.'">Usuń</button>';
        $this->AddButton    = '<button type="submit" name="function" class="add" value="add_'.$_section.'">Dodaj</button>';
        $this->EditButton   = '<button type="submit" name="function" value="edit_'.$_section.'">Edytuj</button>';
    }
    
    abstract public function Show();
    abstract public function Add($_params = array());
    abstract public function Edit($_params = array());
    abstract public function Delete($_param);

}

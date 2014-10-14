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


    protected $DeleteButton = '<button type="submit" name="function" value="delete">Usiń</button>';
    protected $AddButton    = '<button type="submit" name="function" value="add" class="add">Dodaj</button>';
    protected $EditButton   = '<button type="submit" name="function" value="edit">Edytuj</button>';


    public function __construct($_colNames =  array(), $_target)
    {
        $this->ColsNames = $_colNames;
        $this->Target = $_target;
    }
    
    abstract public function Add($_params = array());
    abstract public function Edit($_params = array());
    abstract public function Delete($_param);

}

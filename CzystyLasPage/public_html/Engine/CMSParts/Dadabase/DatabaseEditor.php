<?php

/**
 * Description of DatabaseEditor
 *
 * @author Lukasz
 */
abstract class DatabaseEditor 
{
    protected $ColsNames = array();
    
    public function __construct($_colNames =  array())
    {
        $this->ColsNames = $_colNames;
    }
    
    abstract public function Add($_params = array());
    abstract public function Edit($_params = array());
    abstract public function Delete($_param);

}

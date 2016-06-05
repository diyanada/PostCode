<?php 

class SystemString{
	
    private $Data;

    function __construct() {
        
        $this->Data = parse_ini_file(dirname(__FILE__) . "/../OwshSecret.ini");
    }
    
    public function Url(){ 
        
        try{
            
            return $this->Safe("Url");
        } 
        catch (ConfigurationException $ex) {
            
            die($ex->ErrorMassage());
        }        
    }
    
    public function DataBase(){ 
        
        try{
            
            return $this->Safe("DataBase");
        } 
        catch (ConfigurationException $ex) {
            
            die($ex->ErrorMassage());
        }        
    }
    
    public function VariableType(){ 
        
        try{
            
            return $this->Safe("VariableType");
        } 
        catch (ConfigurationException $ex) {
            
            die($ex->ErrorMassage());
        }        
    }
    
    private function Safe($_Key){
        
        if (isset($this->Data[$_Key])) {
            
            return $this->Data[$_Key];
        }
        else {
            
            require_once (dirname(__FILE__) . "/ServiceException.php");
            $_ServiceException = new ServiceException();

            throw $_ServiceException->ConfigurationFileException();
        }
    }
}
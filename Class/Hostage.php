<?php

//********************************************************************************************
//	Diyanada J. Gunawardena
// 	diyanada@gmail.com
//********************************************************************************************


class Hostage {
    
    private $_Route;
    
    public function __construct($_Url) {
        
        $this->_Route = $this->Url($_Url);
        
        $this->Pathing();
    } 
    
    private function Pathing(){
        
        switch ($this ->Surfing()) {
            
            case "FullyDetailed":
                require_once (dirname(__FILE__) . "/../Core/FullyDetailed.php");
                new FullyDetailed();                
                break;
            default:
                $this->_404();
        }
    }
    
    private function Surfing($_Index = 1){
        
        if (isset($this->_Route[$_Index])) {
            
            return urldecode($this->_Route[$_Index]);
        }
        else {
            
            return NULL;
        }
    }

    private function _404(){
        
        require_once (dirname(__FILE__) . "/SystemString.php");
        $_SystemString = new SystemString();        
        header("Location: " . $_SystemString->Url());
    }

    private function Url($_Url){
                
        if($_Url == NULL){
            $this ->_404();
            exit();
        }
        $_Array = array();
        $_Array = (explode("/", $_Url));
        
        return $_Array;
    }   

}


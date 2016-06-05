<?php

//********************************************************************************************
//	Diyanada J. Gunawardena
// 	diyanada@gmail.com
//********************************************************************************************


class DataBase {
    
    private $_DataBase;
    private $_Collection;


    public function DataBase(){   
        
        try {
            
            require_once (dirname(__FILE__) . "/SystemString.php");
            $_SystemString = new SystemString(); 
            
            $_Mongo = new MongoClient();
            
            $this->_DataBase = $_Mongo->selectDB($_SystemString->DataBase());
        } 
        catch (Exception $ex) {
            
            $_ErrorMsg['Code'] = $ex->getCode();
            $_ErrorMsg['Message'] = $ex->getMessage();

            $ServiceMsg['ServiceStatus'] = $_ErrorMsg;
            die (json_encode($ServiceMsg, JSON_PRETTY_PRINT));
        }        
    }
    
    public function SetCollection($_Name){
        
        try {
            
            $this->_Collection = $this->_DataBase->selectCollection($_Name);
            return $this->_Collection;
        } 
        catch (Exception $ex) {
           
            $_ErrorMsg['Code'] = $ex->getCode();
            $_ErrorMsg['Message'] = $ex->getMessage();

            $ServiceMsg['ServiceStatus'] = $_ErrorMsg;
            die (json_encode($ServiceMsg, JSON_PRETTY_PRINT));
        }
    }
    
    public function Collection(){
        
        return $this->_Collection;
    }

}


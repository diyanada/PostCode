<?php

//********************************************************************************************
//	Diyanada J. Gunawardena
// 	diyanada@gmail.com
//********************************************************************************************


class Common{
    
    protected $_DataBase;
    protected $_ServiceException;

    public function Common(){
        
        require_once (dirname(__FILE__) . "/../Class/DataBase.php");
        $this->_DataBase = new DataBase();
        
        require_once (dirname(__FILE__) . "/../Class/ServiceException.php");
        $this->_ServiceException = new ServiceException();
    }

    protected function GetVerbale($_Name, $_Required = true){
        
        require_once (dirname(__FILE__) . "/SystemString.php");
        $_SystemString = new SystemString(); 
        
        require_once (dirname(__FILE__) . "/ServiceException.php");
        $_ServiceException = new ServiceException();
        
        $_VariableType = $_SystemString->VariableType();
        
        if($_VariableType == "GET"){
            
            $_Return = urldecode(filter_input(INPUT_GET, $_Name));
            
            if($_Return == NULL && $_Required){

                throw $_ServiceException->ParameterException();
            }
            else {
                return $_Return;
            }
            
        }
        else if ($_VariableType == "POST"){
            
            $_Return = urldecode(filter_input(INPUT_POST, $_Name));
            
            if($_Return == NULL && $_Required){
                
                throw $_ServiceException->ParameterException();
            }
            else {
                return $_Return;
            }            
        }
        else {
            
            throw $_ServiceException->ParameterException();
        }
    }
    
    protected function Authenticate($_PassCode) {       

        $_Collection = $this->_DataBase->SetCollection("SystemUser");
            
        $_Query = array("Passcode" => $_PassCode);

        $_Rsults =  $_Collection->find($_Query);

        $_Rsults =  iterator_to_array($_Rsults);

        if (count($_Rsults) != 1){ 

            throw $this->_ServiceException->AuthenticationException();
        }   
    }
}


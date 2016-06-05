<?php

//********************************************************************************************
//	Diyanada J. Gunawardena
// 	diyanada@gmail.com
//********************************************************************************************

require_once (dirname(__FILE__) . "/../Class/Common.php");

class FullyDetailed extends Common {
    
    public function FullyDetailed(){      
        
        try {
            parent::Common();
            
            $_PostCode = $this->GetVerbale("Postcode");
            $_PassCode = $this->GetVerbale("Passcode");
            
            $this->Authenticate($_PassCode); 
            
            $_Collection = $this->_DataBase->SetCollection("Sample");
            
            $_Query = array("PostCode" => $_PostCode);
            $_Returns = array("_id" => 0);
            
            $_Rsults =  $_Collection->find($_Query, $_Returns);
            
            $_Rsults =  iterator_to_array($_Rsults);
            
            if (count($_Rsults) == 0){ 
                
                throw $this->_ServiceException->NullFoundException();
            }
            
            echo json_encode($_Rsults, JSON_PRETTY_PRINT);
            
            exit();
        } 
        catch (Exception $ex) {
            
            $_ErrorMsg['Code'] = $ex->getCode();
            $_ErrorMsg['Message'] = $ex->getMessage();

            $ServiceMsg['ServiceStatus'] = $_ErrorMsg;
            die (json_encode($ServiceMsg, JSON_PRETTY_PRINT));
        }
    }

}


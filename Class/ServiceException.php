<?php

//********************************************************************************************
//	Diyanada J. Gunawardena
// 	diyanada@gmail.com
//********************************************************************************************


class ServiceException{
    
    public function ParameterException(){
        
        $_Message = "Required parameters are not provided.";
        $_Code = "2400";

        return new Exception($_Message, $_Code);
    }
    
    public function NullFoundException(){
        
        $_Message = "Nothing found.";
        $_Code = "2404";

        return new Exception($_Message, $_Code);
    }
    
    public function ConfigurationFileException(){
        
        $_Message = "Configuration file error. Please contact service developers.";
        $_Code = "2402";

        return new Exception($_Message, $_Code);
    }
    
    public function AuthenticationException(){
        
        $_Message = "An Authentication error occured.";
        $_Code = "2403";

        return new Exception($_Message, $_Code);
    }
    
}


<?php
namespace App\Traits;
use App\Structures\Mail as StructMail;

trait MemberValidator {
    protected $mvtrait_emptyQualifierFunc = 'is_null';
    protected $mvtrait_failedValues = [];
    protected $mvtrait_emptyQualifierReturn = null;

    public function easyQualifier($type){
        switch($type){
            case "is_null":
                $this->setEmptyQualifier("is_null");
                $this->setEmptyQualifierReturn(true);
                break;
            //TODO: add more easy qualifiers here
        }
    }
     
    public function setEmptyQualifier($func){
        $this->mvtrait_emptyQualifierFunc = $func;
    }

    public function setEmptyQualifierReturn($obj){
        $this->mvtrait_emptyQualifierReturn = $obj;
    }
    
    public function validateMemberVariables() : int {
        $requiredVarName = $this->getRequiredVarName();
        $optionalVarName = $this->getOptionalVarName();

        $optional = $this->$optionalVarName;
        $required = $this->$requiredVarName;

        $failedCtr = 0;
        foreach($required as $key => $requiredValue){
            if(call_user_func($this->mvtrait_emptyQualifierFunc,$this->$requiredValue) === $this->mvtrait_emptyQualifierReturn){
                $this->mvtrait_failedValues[] = $requiredValue;
                ++$failedCtr;
            }
        }
        return ($failedCtr > 0) ? StructMail::VALIDATE_ERRORS_ENCOUNTERED : 
            StructMail::VALIDATE_OKAY;
    }
}

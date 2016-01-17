<?php

/**
 * Created by PhpStorm.
 * User: davcharles
 * Date: 15/01/2016
 * Time: 12:01 PM
 */
class Error
{
    private $name;
    private $code;
    private $msg;
    public function __construct($ErrorName, $ErrorCode, $ErrorMSG){
        $this->name = $ErrorName;
        $this->code = $ErrorCode;
        $this->msg = $ErrorMSG;
    }
    public function getCode(){
        return $this->code;
    }
    public function getName(){
        return $this->name;
    }
    public function getMsg(){
        return $this->msg;
    }
    public function toJSON(){
        $json = array(
            'name' => $this->getName(),
            'code' => $this->getCode(),
            'msg' => $this->getMsg(),
        );

        return json_encode($json);
    }
}
$error = new Error('this', 'that', 'the other thing');

echo $error->toJSON();
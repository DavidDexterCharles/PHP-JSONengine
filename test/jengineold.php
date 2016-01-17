<?php

/**
 * Created by PhpStorm.
 * User: davcharles
 * Date: 15/01/2016
 * Time: 12:13 PM
 */
class jengine
{
    private $objectname=array();
    private $objectattributes=array();

    public  function __construct($objectname,$objectattributes){

        $this->$objectname =array($objectname=>$this->buildkeyval($objectattributes));
        echo(json_encode($this->$objectname));
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

    public function buildkeyval($attributes=array('empty'))
    {
        foreach ($attributes as $value) {
            print_r($value);
            echo "</br>";
        }
        return $attributes;
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

$colors = array(array('red'=>'apples'), "green", "blue", "yellow");
$check = new jengine('Grapes',$colors);

//echo $check->toJSON();
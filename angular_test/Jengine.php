<?php

/**
 * Created by PhpStorm.
 * User: davcharles
 * Date: 15/01/2016
 * Time: 12:13 PM
 */


class Jengine
{


    public  function __construct(){

    }

    public function buildkeyval($attributes=array('empty'))
    {
        foreach ($attributes as $value) {
            $json[$value]='*empty*';
        }
        return $json;
    }

    public function json_api_call($template)// currently only works with links on local network
    {
        $instance = new self();
        if(filter_var($template, FILTER_VALIDATE_URL)){

            $service_url = $template;
            $curl = curl_init($service_url);

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            // curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
            $curl_response = curl_exec($curl);
            // echo $curl_response;
            $template=$curl_response;
            if($instance->isJson($template))
            {
                curl_close($curl);
                return $template;
            }

            return false;

        }
        else
            return false;

    }


    /*
    public static function json_template($objectname,$objectattributes )
    {
        $instance = new self();
        if($objectname=="")$template =array($instance->buildkeyval($objectattributes));
        else
        $template =array($objectname=>$instance->buildkeyval($objectattributes));
        return json_encode($template);
    }*/
    public static function json_template($objectattributes )
    {
        $instance = new self();
        $valid_api_template=$instance->json_api_call($objectattributes);
        if($valid_api_template==false) {
            $template = array($instance->buildkeyval($objectattributes));//assume attributes passed is to build a new template
            return json_encode($template);
        }
        else {
            $template = $valid_api_template;
            return $template;
        }
    }
    public function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public static function json_add($template,$data )
    {

        $instance = new self();
        $valid_api_template=$instance->json_api_call($template);
        if($valid_api_template==false)
        {

            if($template[0]!='['){// check to see if json have square bracket syntax
                $template="[".$template."]";}
            $template_array=json_decode($template,true);
            //echo sizeof($template_array[0]);
            //echo sizeof($data);
            //print_r($template_array[0]);
            $i=sizeof($data);
            $newindex=0;
            if(sizeof($template_array[0])==sizeof($data)) {

                foreach ($template_array[0] as $index => $value) {
                    // echo  $index;
                    if ($value == "*empty*") {
                        $template_array[0][$index]=$data[(sizeof($data)-$i)];
                        $i=$i-1;

                    }
                    else
                    {
                        if($newindex==0){$newindex=sizeof($template_array);}
                        $template_array[$newindex][$index]=$data[(sizeof($data)-$i)];
                        $i=$i-1;
                    }

                }

            }
            $template=json_encode($template_array);

        }
        else $template=$valid_api_template;



        return $template;
    }



    public static function json_mysqli_result($result ) {
        $braceopen="[";
        $braceclose="]";
        if ($result->num_rows > 0) {
            // output data of each row

            $jsonstring= $braceopen;
            while($row = $result->fetch_assoc()) {
                $jsonstring=$jsonstring.json_encode($row).",";
            }
            $jsonstring= trim($jsonstring,",").$braceclose;
            return $jsonstring;
            //print_r(json_decode($jsonstring));
        } else {
            return "</br><hr><span style='color: red'>Error in generating Json:</span> please ensure that the below parameter passed to Jengine is a mysqli_result object </br><hr></br><div style='color: red'>Parameter:</div></div></br> ".$result."</br><hr></br></br>";
        }
    }
}


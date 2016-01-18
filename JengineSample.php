<?php
/**
 * Created by PhpStorm.
 * User: davcharles
 * Date: 18/01/2016
 * Time: 01:22 PM
 */

require_once('Jengine.php');


echo "<b> Creating a new json template using attributes</b>";echo '</br></br>';

$json_attributes = array("color", "speed", "type");//attributes of a car object

$template=Jengine::json_template($json_attributes);
echo $template;

//Results:
/*
  [{
       "color": "*empty*",
       "speed": "*empty*",
       "type": "*empty*"
   }]

 */
echo '</br></br></br>';

echo "<b> Adding data to the new Template</b>";echo '</br></br>';

$json_data1=array("red", "slow", "volvo");
$json_data2=array("Green", "fast", "viper");

$template=Jengine::json_add($template,$json_data1);
echo $template;

echo '</br></br>';

$template=Jengine::json_add($template,$json_data2);
echo $template;
echo '</br></br></br>';

echo "<b> Using template loaded from  data source</b>";echo '</br></br>';
echo '</br></br>';

$template=Jengine::json_template('http://localhost/PHP-JSONengine/data.json');
echo $template;







//$json_attributes = array("color", "speed", "type");
//$json_data1=array("red", "slow", "gold");
//$json_name="Cars";
//
//$json_data2=array("Nickelia Lionjack","Scarborough","Trinidad");
//
//
//
//
////$template =Jengine::json_template($json_attributes);//or result returned by json_mysqli_result($result )
//
//$template =Jengine::json_template('http://localhost/PHP-JSONengine/test/test.json');
////echo $template;
//
//
////link to a json source
////json attributes, that would by default be used to create an empty json template
////the
//
//
//$template=Jengine::json_add($template,$json_data2 );
//$template=Jengine::json_add($template,$json_data1 );
//
////$check2=Jengine::json_mysqli_result($colors);
//
//echo $template;

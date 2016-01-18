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

//Result:
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

//Result:

//[{"color":"red","speed":"slow","type":"volvo"}]





echo '</br></br>';

$template=Jengine::json_add($template,$json_data2);
echo $template;
echo '</br></br></br>';

//Result:

//[{"color":"red","speed":"slow","type":"volvo"},{"color":"Green","speed":"fast","type":"viper"}]

echo "<b> Using template loaded from  data source</b>";echo '</br></br>';
echo '</br></br>';

$template=Jengine::json_template('http://localhost/PHP-JSONengine/data.json');
echo $template;

//[{ "Name": "David Charles", "City": "Berlin", "Country": "Germany" }, { "Name": "Ana Trujillo Emparedados y helados", "City": "MÃ©xico D.F.", "Country": "Mexico" }, { "Name": "Antonio Moreno TaquerÃ­a", "City": "MÃ©xico D.F.", "Country": "Mexico" }]


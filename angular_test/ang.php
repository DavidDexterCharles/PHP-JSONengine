<?php

header('Access-Control-Allow-Origin: *');//http://stackoverflow.com/questions/20035101/no-access-control-allow-origin-header-is-present-on-the-requested-resource
require_once('Jengine.php');


$template=Jengine::json_template('http://localhost/PHP-JSONengine/angular_test/data.json');
echo $template;
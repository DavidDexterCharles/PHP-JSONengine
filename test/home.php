<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8"> <!--    use this to include special characters you may not find on your keyboard-->

</head>


<body>


<?php


    $json=json_decode(file_get_contents('test.json'),TRUE);
   // print_r($json);
    //print_r($json["records"]);
    print_r($json["records"][0]);
    echo "</br>";
    echo "</br>";
    print_r($json["records"][1]);

?>

</body>
</html>
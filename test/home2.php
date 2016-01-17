<!DOCTYPE html>
<html>
<body>

<form method="post" action="home.php">
    Link: <input type="text" name="link">
    Title: <input type="text" name="title">
    Description: <input type="text" name="desc">
    <input type="submit">
</form>

<?php
//var_dump($_POST['link']);
if (isset($_POST['link'])&&!empty(trim($_POST['link']))) {
    // collect value of input field

    $json=json_decode(file_get_contents('links.json'),TRUE);
    print_r($json);
    $arr = array($json,"link"=>$_POST['link'], "title"=>$_POST['title'], "desc"=>$_POST['desc']);
    print_r($arr);
    echo "</br></br></br> New Array  ";
    //$json =array_push($arr,$json);
    file_put_contents('links.json', json_encode($arr,TRUE));
    print_r($arr);


    $a = '{"links":[' +
        '{"link":'+$_POST['link']+',"title":"Doe" },' +
        '{"firstName":"Anna","lastName":"Smith" },' +
        '{"firstName":"Peter","lastName":"Jones" }]}';














}
else {
    echo "please full all fields";
}
?>

</body>
</html>
<!DOCTYPE html>
<html>
<body>

<?php
require_once('Jengine.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_reservations";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM room";
$result = $conn->query($sql);

$check2=Jengine::json_mysqli_result($result);
echo $check2;

var_dump($result);// Aresult Object is returned

//$braceopen="[";
//$braceclose="]";
//
//$jsonstring="";
//if ($result->num_rows > 0) {
//    // output data of each row
//
//    $jsonstring= $braceopen;
//    while($row = $result->fetch_assoc()) {
//        //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
//      //  echo json_encode($row);
////        echo ",";
//
//        $jsonstring=$jsonstring.json_encode($row).",";
//    }
//    $jsonstring= trim($jsonstring,",").$braceclose;
//    echo $jsonstring;
//    print_r(json_decode($jsonstring));
//} else {
//    echo "0 results";
//}

$conn->close();
?>

</body>
</html>
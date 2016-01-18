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

$conn->close();
?>

</body>
</html>
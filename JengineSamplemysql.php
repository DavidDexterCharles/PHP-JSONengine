<!DOCTYPE html>
<html>
<body>

<?php

// This example demonstrate how your mysql result from database can quickly be converted to a jengine json template that must be of the form :


/*
[{
    "Index1": "*value1",
	"Index3": "value2",
	"Index3": "value3"
}]

*/


require_once('Jengine.php');

$servername = "your_server";//localhost
$username = "your_user_name";//root
$password = "your_password(optional)";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM sometable ";
$result = $conn->query($sql);


echo "<b> Using template loaded from  data source</b>";echo '</br></br>';
echo '</br></br>';

$template=Jengine::json_mysqli_result($result);
echo $template;



$conn->close();
?>

</body>
</html>
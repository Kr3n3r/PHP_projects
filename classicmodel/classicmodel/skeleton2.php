<html>
<head><title>Modificar empleado</title></head>
<body>

<?php

include_once 'utils.php';

$host="10.10.0.3";
$port=3306;
$socket="";
$user="";
$password="";
$dbname="";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

//querys here

$con->close();
?>

</body>
</html>
<html>
<head><title>Modificar empleado</title></head>
<body>
<form method="get" action=".php">
<?php 

include_once 'utils.php';

$host="10.10.0.3";
$port=3306;
$socket="";
$user="Northwind";
$password="Northwind";
$dbname="Northwind";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

//querys here

$con->close();
?>
</form>
</body>
</html>

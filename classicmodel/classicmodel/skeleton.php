<html>
<head><title>Modificar empleado</title></head>
<body>
<form>
<?php 
include_once 'utils.php';
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());



$con->close();
?>
</form>
</body>
</html>

<?php 
include_once '../utils.php';
catchRequired("orderNumber");?>
<html>
<head><title>Modificar empleado</title></head>
<body>
<h1>Número de orden: <?php echo $orderNumber;?></h1>
<form>
<?php
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());



$con->close();
?>
</form>
</body>
</html>
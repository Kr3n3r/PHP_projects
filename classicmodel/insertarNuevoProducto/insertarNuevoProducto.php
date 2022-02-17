<html>
<head><title>Modificar empleado</title></head>
<body>
<form method="get" action="insertarNuevoProducto.act.php">
<select name="orderNumber">
<option value=""></option>
<?php 
include_once '../utils.php';
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select orderNumber,orderDate from orders";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($orderNumber, $orderDate);
    while ($stmt->fetch()) {
        printf("<option value='$orderNumber'>%s(%s)</option>", $orderNumber, $orderDate);
    }
    $stmt->close();
}

$con->close();
?>
</select>
<input type="submit">
</form>
</body>
</html>

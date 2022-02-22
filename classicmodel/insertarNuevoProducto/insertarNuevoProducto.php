<html>
<head><title>Insertar nuevo producto a la order</title></head>
<body>
<form method="get" action="insertarNuevoProducto.act.php">
<select name="orderNumber">
<option value=""></option>
<?php 
// include_once '../utils.php';
$host="172.17.0.2";
$port=3306;
$socket="";
$user="classicmodels";
$password="classicmodels";
$dbname="classicmodels";
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

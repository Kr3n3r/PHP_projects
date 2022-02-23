<html>
<head><title>Ejercicio3</title></head>
<body>
<form method="get" action="ejercicio3-2.php">
<label for="orderNumber">Orden:</label><select name="orderNumber">
<?php 
$host="10.10.0.3";
// $host="172.17.0.2";
$port=3306;
$socket="";
$user="classicmodels";
$password="classicmodels";
$dbname="classicmodels";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
$query = "select orders.orderNumber,customers.customerName from orders join customers on customers.customerNumber=orders.customerNumber order by orders.orderNumber";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($orderNumber, $customerName);
    while ($stmt->fetch()) {
        printf("<option value='$orderNumber'>%s - %s</option>", $orderNumber, $customerName);
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
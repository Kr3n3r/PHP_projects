<?php 
$host="172.17.0.2";
$port=3306;
$socket="";
$user="classicmodels";
$password="classicmodels";
$dbname="classicmodels";
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
$orderNumber=$_GET["orderNumber"];
?>
<html>
<head><title>Modificar empleado</title></head>
<body>
<h1>N&uacutemero de orden: <?php echo $orderNumber;?></h1>
<form method="get" action="insertarNuevoProducto.ins.php">
<?php
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select orderDate,customerName from orders join customers on customers.customerNumber = orders.customerNumber where orders.orderNumber = $orderNumber";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($orderDate, $customerName);
    while ($stmt->fetch()) {
        printf("<h1>Fecha: %s <br> Nombre del cliente:%s \n</h1>", $orderDate, $customerName);
    }
    $stmt->close();
}
$query = "select prod.productName, orddet.priceEach, orddet.quantityOrdered from products prod join orderdetails orddet on orddet.productCode=prod.productCode where orddet.orderNumber=$orderNumber";

echo '<table border="1">';
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($productName, $priceEach, $quantityOrdered);
    while ($stmt->fetch()) {
        $totalperproduct=$priceEach*$quantityOrdered;
        $total+=$totalperproduct;
        printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $productName, $priceEach, $quantityOrdered, $totalperproduct);
    }
    $stmt->close();
    printf("<tr><td colspan=3>Total:</td><td>%s</td></tr>", $total);
}
echo "</table>";
?>
<select name="newProductCode">
<?php 
$query = "select productCode,productName,buyPrice from products";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($productCode, $productName, $buyPrice);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s - %s</option>", $productCode, $productName, $buyPrice);
    }
    $stmt->close();
}?>

</select>
<input name="newquantity" type="text">
<input type="submit">
</form>
</body>
</html>
<?php $con->close();?>
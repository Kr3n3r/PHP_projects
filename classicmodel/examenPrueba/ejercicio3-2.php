<html>
<h1>N&uacutemero de orden: <?php $orderNumber=$_GET["orderNumber"]; echo $orderNumber; ?></h1>
<h1>Cliente: <?php
$host="10.10.0.3";
// $host="172.17.0.2";
$port=3306;
$socket="";
$user="classicmodels";
$password="classicmodels";
$dbname="classicmodels";
$rownumber=1;
$amount=0;

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select customers.customerName from customers join orders on orders.customerNumber=customers.customerNumber  where orders.orderNumber=$orderNumber";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customerNumber);
    while ($stmt->fetch()) {
        printf("%s", $customerNumber);
    }
    $stmt->close();
}
?></h1>
<h1>Fecha de la orden: <?php 
$query = "select orders.orderDate from orders where orderNumber=$orderNumber";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($orderDate);
    while ($stmt->fetch()) {
        printf("%s", $orderDate);
    }
    $stmt->close();
}
?></h1>
<table border=1>
<?php 
$query = "select products.productName,  orderdetails.priceEach,  orderdetails.quantityOrdered,  sum(orderdetails.priceEach*orderdetails.quantityOrdered) as suma from products join orderdetails on orderdetails.productCode=products.productCode where orderNumber=$orderNumber group by products.productName";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($productName, $priceEach, $quantityOrdered, $suma);
    while ($stmt->fetch()) {
        $amount += $suma;
        printf("<tr><td><li></li></td><td>%s</td><td>%s �</td><td>%s</td><td>%s �</td></tr>", $productName, $priceEach, $quantityOrdered, $suma);
    }
    printf("<td colspan=4>Total:</td><td>%s</td>", $amount);
    $stmt->close();
}
$con->close();
?>
</table>
</html>
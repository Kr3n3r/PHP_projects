<html>
<head><title>Mostrar pedidos por cada producto</title></head>
<body>
<?php 
$host="10.10.0.3";
$port=3306;
$socket="";
$user="classicmodels";
$password="classicmodels";
$dbname="classicmodels";
$products=$_GET["productos"];

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

foreach ($products as $product) {
    $query = "select orders.orderNumber, orders.orderDate from orders join orderdetails on orderdetails.orderNumber=orders.orderNumber where orderdetails.productCode='$product';";
    
    echo "<table border=1><th><h1>Product: $product</h1></th>";
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($orderNumber, $orderDate);
        while ($stmt->fetch()) {
            printf("<tr><td>%s - %s</td></tr>", $orderNumber, $orderDate);
        }
        $stmt->close();
    }
    echo "</table><br>";
}
$con->close();
?>
</body>
</html>
<html>
<head><title>Mostrar órdenes</title></head>
<body>
<table border='1'>
<tr><th>OrderID</th><th align='left'>CompanyName</th><th>Importe</th></tr>
<?php

include_once 'utils.php';

$host="10.10.0.3";
$port=3306;
$socket="";
$user="Northwind";
$password="Northwind";
$dbname="Northwind";

$total=catchRequired("total");

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select Orders.OrderID,
Orders.ShipName,
round(sum(OrderDetails.UnitPrice*(1 - OrderDetails.Discount)*OrderDetails.Quantity),2) as suma
from Orders 
join OrderDetails on OrderDetails.OrderID=Orders.OrderID
group by OrderID;";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($OrderID, $ShipName, $suma);
    while ($stmt->fetch()) {
        if ($suma >= (int)$total){
            printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $OrderID, $ShipName, $suma);
        }
    }
    $stmt->close();
}

$con->close();
?>
</table>
</body>
</html>
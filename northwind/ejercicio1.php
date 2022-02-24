<html>
<head><title>Mostrar productos y cantidades</title></head>
<body>
<table border='1'>
<?php

include_once 'utils.php';

$host="172.17.0.3";
$port=3306;
$socket="";
$user="northwind";
$password="northwind";
$dbname="northwind";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select prod.product_name, prod.quantity_per_unit from products prod order by prod.product_name";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($product_name, $quantity_per_unit);
    while ($stmt->fetch()) {
        printf("<tr><td>%s</td><td>%s</td></tr>", $product_name, $quantity_per_unit);
    }
    $stmt->close();
}

$con->close();
?>
</table>
</body>
</html>
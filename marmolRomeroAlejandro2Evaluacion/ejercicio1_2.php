<html>
<head><title>Mostrar datos</title></head>
<body>
<table border='1'>
<tr><th align='left'>Producto</th><th>Proveedor</th><th>Categoría</th></tr>
<?php

include_once 'utils.php';

$host="10.10.0.3";
$port=3306;
$socket="";
$user="Northwind";
$password="Northwind";
$dbname="Northwind";

$SupplierID=catched("CompanyName");
$CategoryID=catched("CategoryName");

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

if(is_null($SupplierID)){
    $query = "select Products.ProductName,Categories.CategoryName from Products join Categories using (CategoryID) where CategoryID=$CategoryID";
    
    
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($ProductName, $CategoryName);
        while ($stmt->fetch()) {
            printf("<tr><td>%s</td><td></td><td>%s</td></tr>", $ProductName, $CategoryName);
        }
        $stmt->close();
    }
}
elseif (is_null($CategoryID)) {
    $query = "select Products.ProductName,Suppliers.CompanyName from Products join Suppliers using (SupplierID) where SupplierID=$SupplierID";
    
    
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($ProductName, $CompanyName);
        while ($stmt->fetch()) {
            printf("<tr><td>%s</td><td>%s</td><td></td></tr>", $ProductName, $CompanyName);
        }
        $stmt->close();
    }
}
else{
    $query = "select Products.ProductName,Suppliers.CompanyName,Categories.CategoryName from Products join Categories using (CategoryID) join Suppliers using (SupplierID) where CategoryID=$CategoryID and SupplierID=$SupplierID";
    
    
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($ProductName, $CompanyName, $CategoryName);
        while ($stmt->fetch()) {
            printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $ProductName, $CompanyName, $CategoryName);
        }
        $stmt->close();
    }
}
$con->close();
?>
</table>
</body>
</html>
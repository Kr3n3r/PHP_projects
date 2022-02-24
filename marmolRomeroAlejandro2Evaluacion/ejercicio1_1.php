<html>
<head><title>Seleccionar proveedor y categoría</title></head>
<body>
<form method="get" action="ejercicio1_2.php">
<label for='CompanyName'>CompanyName: </label><select name="CompanyName">
<option value=''></option>
<?php 

include_once 'utils.php';

$host="10.10.0.3";
$port=3306;
$socket="";
$user="Northwind";
$password="Northwind";
$dbname="Northwind";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select Suppliers.SupplierID,Suppliers.CompanyName from Suppliers";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($SupplierID, $CompanyName);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s</option>", $SupplierID, $CompanyName);
    }
    $stmt->close();
}
?>
</select>
<br>
<br>
<label for='CategoryName'>CategoryName: </label><select name="CategoryName">
<option value=''></option>
<?php 
$query = "select CategoryID,CategoryName from Categories";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($CategoryID, $CategoryName);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s</option>", $CategoryID, $CategoryName);
    }
    $stmt->close();
}
?>
</select>
<br>
<br>
<input type='submit' value='aceptar'>
</form>
<?php $con->close();?>
</body>
</html>
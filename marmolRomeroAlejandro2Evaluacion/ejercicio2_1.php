<html>
<head><title>Seleccionar empleado</title></head>
<body>
<form method="get" action="ejercicio2_2.php">
<label for='EmployeeID'>Empleado: </label><select name='EmployeeID'>
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

$query = "select EmployeeID,LastName,FirstName from Employees";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($EmployeeID, $LastName, $FirstName);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s,%s</option>", $EmployeeID, $LastName, $FirstName);
    }
    $stmt->close();
}

$con->close();
?>
</select>
<br><br>
<input type="submit" value='aceptar'>
</form>
</body>
</html>
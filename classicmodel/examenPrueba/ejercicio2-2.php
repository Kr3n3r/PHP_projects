<html><head><title>Seleccionar oficina para cambiar la actual</title></head>
<body>
<form action="ejercicio2-3.php" method='get'>
<label for="Code">Oficina:</label><select name="Code">
<?php 
$host="10.10.0.3";
$port=3306;
$socket="";
$user="classicmodels";
$password="classicmodels";
$dbname="classicmodels";
$employeeNumber=$_GET["employeeNumber"];

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
$query = "select officeCode, city from offices";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($officeCode, $city);
    while ($stmt->fetch()) {
        printf("<option value='%s %s'>%s</option>", $employeeNumber, $officeCode, $city);
    }
    $stmt->close();
}
$con->close();
?>
</select>
<input type='submit'>
</form>
</body></html>
<html><head><title>Escoger empleado</title></head>
<body>
<form action="ejercicio2-2.php" method="get">
<label for="employeeNumber">Empleado:</label>
<select name="employeeNumber">
<?php 
$host="10.10.0.3";
$port=3306;
$socket="";
$user="classicmodels";
$password="classicmodels";
$dbname="classicmodels";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
$query = "select employeeNumber,lastName,firstName,city from employees join offices on offices.officeCode = employees.officeCode";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($employeeNumber, $lastName, $firstName, $city);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s,%s - %s</option>", $employeeNumber, $lastName, $firstName, $city);
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
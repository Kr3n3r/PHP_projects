<html>
<head><title>Elegir empleado</title></head>
<body>
<table>
<tr><th>Empleados</th></tr>
<?php 
include_once 'utils.php';
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select employeeNumber,firstName,lastName from employees;";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($employeeNumber, $firstName, $lastName);
    while ($stmt->fetch()) {
        printf("<tr><th><a href='ejercicioBDClassicModels.act.php?employeeNumber=%s'>%s %s</a></th></tr>", $employeeNumber, $firstName, $lastName);
    }
    $stmt->close();
}

$con->close();
?>
</table>
</body>
</html>

<html>
<head><title>Mostrar clientes por empleado</title></head>
<body><table>
<?php 
$host="10.10.0.3";
$port=3306;
$socket="";
$user="classicmodels";
$password="classicmodels";
$dbname="classicmodels";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select lastName,firstName,employeeNumber from employees;";

$stmt = $con->query($query);
    $stmt->execute();
$stmt->bind_result($lastName, $firstName, $employeeNumber);
while ($stmt->fetch_assoc()) {
    printf("<tr><th>%s</th><th>%s</th></tr>", $lastName, $firstName);
}
$stmt->close();

// $query = "select lastName,firstName,employeeNumber from employees";


// if ($stmt = $con->prepare($query)) {
//     $stmt->execute();
//     $stmt->bind_result($lastName, $firstName, $employeeNumber);
//     while ($stmt->fetch()) {
//         //printf("%s, %s, %s\n", $lastName, $firstName, $employeeNumber);
//     }
//     $stmt->close();
// }
$con->close();
?>
</table>
</body>
</html>
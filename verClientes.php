<?php
$host="10.10.0.3";
$port=3306;
$socket="";
$user="sakila";
$password="sakila";
$dbname="sakila";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select first_name,last_name from customer";

echo "<table border=1>";
echo "<tr><th>Nombre</th><th>Apellidos</th>";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name);
    while ($stmt->fetch()) {
        echo "<tr>";
        printf("<td>%s</td><td>%s</td>", $first_name, $last_name);
        echo "</tr>";
    }
    $stmt->close();
}
echo "</table>";

$con->close();
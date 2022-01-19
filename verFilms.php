<?php
$host="10.10.0.3";
$port=3306;
$socket="";
$user="sakila";
$password="sakila";
$dbname="sakila";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select title,release_year from film";

echo "<table border=1>";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($title, $release_year);
    while ($stmt->fetch()) {
        echo "<tr>";
        printf("<td>%s</td><td>%s</td>", $title, $release_year);
        echo "</tr>";
    }
    $stmt->close();
}
echo "</table>";

$con->close();
<html>
<body>
<style type="text/css">
tr:nth-child(even) {background-color: #e2ebf0;}
</style>
<table border="1">
<tr><th>Nombre</th><th>Apellidos</th></tr>
<?php
$host="10.10.0.3";
$port=3306;
$socket="";
$user="sakila";
$password="sakila";
$dbname="sakila";
$actor_id = $_GET['actor_id'];

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select first_name,last_name from actor where actor_id='$actor_id'";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name);
    while ($stmt->fetch()) {
        printf("<tr><td>%s</td><td>%s</td></tr>", $first_name, $last_name);
    }
    $stmt->close();
}
$con->close();
?>
</table>
</body>
</html>
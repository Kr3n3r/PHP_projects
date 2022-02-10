<html>
<head><title>Ejercicio insertar ciudades</title></head>
<body>
<form action="direcciones.act.php" method="get">
<select name="id_pais">
<option value="">
<?php 
$host="10.10.0.3";
$port=3306;
$socket="";
$user="sakila";
$password="sakila";
$dbname="sakila";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select country_id,country from country order by country";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($country_id, $country);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s</option>", $country_id, $country);
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
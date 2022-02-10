<html>
<head><title>Formulario vista películas</title></head>
<body>
<?php 
$host="10.10.0.3";
$port=3306;
$socket="";
$user="sakila";
$password="sakila";
$dbname="sakila";
$country_id=$_GET['id_pais'];

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select country from country where country_id='$country_id';";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($country);
    while ($stmt->fetch()) {
        echo "<b> $country_id, $country</b><br>";
    }
    $stmt->close();
}

$query = "select city from city where country_id='$country_id'";

echo "<table border=1>";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($city);
    while ($stmt->fetch()) {
        printf("<tr><td>%s</td></tr>", $city);
    }
    $stmt->close();
}
echo "</table>";
?>
<form method="get" action="paises.act.insert.php">
<input type="hidden" name="country_id" value="<?php echo $country_id;?>">
<input type="text" name="city">
<input type="submit">
</form>
</body>
</html>

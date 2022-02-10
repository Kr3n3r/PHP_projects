<html>
<head><title>Formulario vista películas</title></head>
<body>
<form method="get" action="direcciones.act.insert.php">
Direccion:<input type="text" name="adress" required><br>
Direccion2:<input type="text" name="adress2"><br>
Distrito:<input type="text" name="district" required><br>
Ciudad:<select name="city_id"><br>
<option value=""></option>
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

$query = "select city_id,city from city where country_id='$country_id'";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($city_id, $city);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s</option>", $city_id, $city);
    }
    $stmt->close();
}
?>
</select>
Código postal:<input type="text" name="postal_code"><br>
Teléfono:<input type="text" name="phone" required><br>
<input type="submit">
</form>
</body>
</html>

<html>
<head><title>Formulario vista películas</title></head>
<body>
<form action="formulario.act.php" method="get">
<select name="film_id">
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
$query = "select title,film_id from film order by title";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($title, $film_id);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s</option>", $film_id,$title);
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

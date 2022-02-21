<html>
<head><meta charset="utf-8"><title>Mostrar alquileres</title></head>
<body>
<table border="1">
<th>Pel&iacutecula</th><th>N&uacutemero de alquileres</th>
<?php 
include_once '../utils.php';
// $host="172.17.0.2";
// $port=3306;
// $socket="";
// $user="sakila";
// $password="sakila";
// $dbname="sakila";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select film.title, count(rental.rental_id) as suma 
from film, rental, inventory 
where film.film_id = inventory.film_id 
and inventory.inventory_id = rental.inventory_id 
group by film.title";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($title, $suma);
    while ($stmt->fetch()) {
        printf("<tr><td>%s</td><td>%s</td></tr>", $title, $suma);
    }
    $stmt->close();
}
?>
<th>Total:</th><th>
<?php 
$query = "select count(rental_id) as total from rental";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($total);
    while ($stmt->fetch()) {
        printf("%s", $total);
    }
    $stmt->close();
}
$con->close();
?>
</th>
</table>
</body>
</html>
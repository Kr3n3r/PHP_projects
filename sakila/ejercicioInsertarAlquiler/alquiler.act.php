<html>
<head><title>Insertar alquiler pg 2</title></head>
<body>
<?php 
include_once '../utilswindows.php';
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
catchRequired("film_id");
catchRequired("customer_id");
catchRequired("store_id");
// $film_id=$_GET["film_id"];
// $customer_id=$_GET["customer_id"];
// $store_id=$_GET["store_id"];

?>

<form method="get" action="alquiler.act.insert.php">

<label for="inventory_id">Películas: </label><select name="inventory_id">
<option value=""></option>
<?php 
$query = "select inventory.inventory_id, film.title  
from film,inventory,rental 
where film.film_id = inventory.inventory_id 
and inventory.inventory_id = rental.inventory_id 
and rental.return_date is not null 
and film.film_id=$film_id
and inventory.store_id=$store_id;";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($inventory_id, $title);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s</option>", $inventory_id, $title);
    }
    $stmt->close();
}
?>
</select>
<label for="staff_id">Empleados: </label><select name="staff_id">
<option value=""></option>
<?php 
$query = "select distinct staff_id,first_name,last_name  from staff  where store_id=$store_id  and active=1";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($staff_id, $first_name, $last_name);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s %s</option>", $staff_id, $first_name, $last_name);
    }
    $stmt->close();
}
$con->close()
?>
</select>
<input type="hidden" value='<?php echo $customer_id;?>' name="customer_id">
<input type="submit">
</form>
</body>
</html>
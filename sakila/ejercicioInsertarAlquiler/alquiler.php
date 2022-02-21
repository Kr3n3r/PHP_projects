<html>
<head><title>Insertar alquileres : formulario inicial</title></head>
<body>
<?php include_once '../utilswindows.php';
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());?>
<form method="get" action="alquiler.act.php">
<label for="customer_id">Cliente: </label><select name="customer_id">
<option value=""></option>
<?php 
$query = "select customer_id,first_name,last_name from customer order by last_name,first_name";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customer_id, $first_name, $last_name);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s %s</option>", $customer_id, $first_name, $last_name);
    }
    $stmt->close();
}
?>
</select>
<label for="film_id">Película: </label><select name="film_id">
<option value=""></option>
<?php 
$query = "select film_id,title from film order by title;";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($film_id, $film);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s</option>", $film_id, $film);
    }
    $stmt->close();
}
?>
</select>
<label for="store_id">Tienda: </label><select name="store_id">
<option value=""></option>
<?php 
$query = "select store.store_id,address.address from store,address where address.address_id = store.address_id order by store.address_id;";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($store_id, $address);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s</option>", $store_id, $address);
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
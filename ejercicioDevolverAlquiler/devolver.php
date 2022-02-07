<html>
<head><title>Devolver alquileres : formulario inicial</title></head>
<body>
<?php include_once '../utils.php';?>
<form method="get" action="devolver.act.php">
<label for="rental_id">Seleccione la película que quiere devolver: </label><select name="rental_id">
<option value=""></option>
<?php 
$query = "select rental.rental_id,rental.inventory_id,film.title  from rental,inventory,film where rental.return_date is NULL and rental.inventory_id=inventory.inventory_id  and inventory.film_id=film.film_id";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($rental_id, $inventory_id, $title);
    while ($stmt->fetch()) {
        echo "<option value='$rental_id'>$inventory_id .- $title</option>";
    }
    $stmt->close();
}
?>
</select>
<input type="submit">
</form>
</body>
</html>
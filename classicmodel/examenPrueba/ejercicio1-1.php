<html>
<head><title>Escoger productos</title></head>
<body>
<form action="ejercicio1-2.php" method="get">
Productos:<select name="productos[]" multiple>
<?php 
$host="10.10.0.3";
$port=3306;
$socket="";
$user="classicmodels";
$password="classicmodels";
$dbname="classicmodels";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
$query = "select productCode,productName from products";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($productCode, $productName);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s</option>", $productCode, $productName);
    }
    $stmt->close();
}
$con->close();
?>
</select>
<input type=submit>
</form>
</body>
</html>
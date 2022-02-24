<html>
<head><title>Seleccionar territorios</title></head>
<body>
<form method="get" action="ejercicio2_3.php">
<label for='TerritoryID'>Territorios: </label><select name='TerritoryID[]' multiple size='7'>
<?php 

include_once 'utils.php';

$host="10.10.0.3";
$port=3306;
$socket="";
$user="Northwind";
$password="Northwind";
$dbname="Northwind";

$EmployeeID=catched("EmployeeID");

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select distinct Territories.TerritoryID,Territories.TerritoryDescription from EmployeeTerritories join Employees using (EmployeeID) join Territories using (TerritoryID) where EmployeeID=$EmployeeID";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($TerritoryID, $TerritoryDescription);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s</option>", $TerritoryID, $TerritoryDescription);
    }
    $stmt->close();
}
$con->close();
?>
</select>
<br><br>
<input type='hidden' name='EmployeeID' value='<?php echo $EmployeeID;?>'>
<input type="submit" value='aceptar'>
</form>
</body>
</html>
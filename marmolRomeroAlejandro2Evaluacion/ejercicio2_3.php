<html>
<head><title>Modificar territorios del empleado</title></head>
<body>
<?php

include_once 'utils.php';

$host="10.10.0.3";
$port=3306;
$socket="";
$user="Northwind";
$password="Northwind";
$dbname="Northwind";

$EmployeeID=catchRequired("EmployeeID");
$TerritoryID=catchRequired("TerritoryID");

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

foreach ($TerritoryID as $Territory) {
    $query = "delete from EmployeeTerritories where TerritoryID=$Territory and EmployeeID=$EmployeeID";
    $con->query($query);
    if (!$con->error){
        printf("Se ha quitado el empleado con ID %s del territorio con ID %s<br>", $EmployeeID, $Territory);
    }
    else{
        printf("NO se ha podido quitar el empleado con ID %s del territorio con ID %s<br>", $EmployeeID, $Territory);
    }
}
$con->close();
?>
</body>
</html>
<html>
<head><title>Modificar empleado</title></head>
<body>
<form method='get' action='ejercicioBDClassicModels.act.up.php'>
<?php 
include_once 'utils.php';
$employeeNumber=$_GET["employeeNumber"];
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
?>
<label for='lastName'>Apellidos:</label><input type='text' name='lastName'>
<label for='firstName'>Nombre:</label><input type='text' name='firstName'>
<label for='extension'>extensión:</label><input type='text' name='extension'>
<label for='email'>email:</label><input type='email' name='email'>
<label for='officeCode'>Código de oficina:</label>
<select name='officeCode'>
<option value=''></option>
<?php 
$query = "select distinct officecode from offices;";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($officeCode);
    while ($stmt->fetch()) {
        printf("<option value='%s'>$officeCode</option>", $officeCode);
    }
    $stmt->close();
}
?>
</select>
<label for='reportsTo'>Código de jefe:</label>
<select name='reportsTo'>
<option value=''></option>
<?php 
$query = "select distinct employeeNumber from employees;";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($reportsTo);
    while ($stmt->fetch()) {
        printf("<option value='%s'>$reportsTo</option>", $reportsTo);
    }
    $stmt->close();
}
?>
</select>
<label for='jobTitle'>Nombre del puesto:</label><input type='text' name='jobTitle'>
<input type='hidden' name='employeeNumber'value='<?php echo $employeeNumber;?>'>
<input type='submit'>
</form>
</body>
</html>
<?php 
$con->close();
?>
<html>
<head><title>Modificar empleado</title></head>
<body>
<form>
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
<label for='officeCode'>Código de oficina:</label><input type='number'>
</form>
</body>
</html>
<?php 
$con->close();
?>
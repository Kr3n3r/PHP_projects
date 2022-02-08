<html>
<head><title>Crear base de datos</title></head>
<body>
<?php 
include_once '../utils.php';
catchRequired("user");
catchRequired("password");
catchRequired("database");
if($con = new mysqli($host, $user, $password, $dbname, $port, $socket)){
    $con->close();  
}
else{
    die ('Could not connect to the database server' . mysqli_connect_error());
}
;?>
</body>
</html>
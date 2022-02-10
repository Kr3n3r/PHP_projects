<html>
<head><title>Formulario vista películas</title></head>
<body>
<?php
$host = "10.10.0.3";
$port = 3306;
$socket = "";
$user = "sakila";
$password = "sakila";
$dbname = "sakila";
$country_id = $_GET['country_id'];
$city = $_GET['city'];

$con = new mysqli($host, $user, $password, $dbname, $port, $socket) or die('Could not connect to the database server' . mysqli_connect_error());

$query = "select city from city where city='$city' and country_id='$country_id';";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    if ($stmt->fetch()) {
        printf("La ciudad '%s' ya existe", $city);
    }
    else {
        $query = "insert into city(city,country_id) values('$city','$country_id');";
        
        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            printf("La ciudad '%s' ha sido añadida", $city);
        }
    }
    $stmt->close();
} 
$con->close();
?>

</body>
</html>
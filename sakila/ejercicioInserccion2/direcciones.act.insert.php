<html>
<head><title>Formulario vista películas</title></head>
<body>
<?php 
$host="10.10.0.3";
$port=3306;
$socket="";
$user="sakila";
$password="sakila";
$dbname="sakila";
// $fields=array('address','address2','district','city_id','postal_code','phone');
$address=$_GET["adress"];
$address2=$_GET["adress2"];
$district=$_GET["district"];
$city_id=$_GET["city_id"];
$postal_code=$_GET["postal_code"];
$phone=$_GET["phone"];

// foreach ($fields as $element) {
//     if (!isset($_GET[$element])) {
//         die ('Falta el parámetro '. $element);
//     };
//     if (empty($_GET[$element])) {
//         die ('Falta  el parámetro '. $element);
//     }
// }

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "insert into address(address,address2,district,city_id,postal_code,phone) values('$address','$address2','$district','$city_id','$postal_code','$phone')";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    printf("La dirección ha sido añadida");
    $stmt->close();
}
?>
</body>
</html>

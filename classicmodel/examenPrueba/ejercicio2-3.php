<html>
<head><title>Modificación</title></head>
<body>
<?php 
$host="10.10.0.3";
$port=3306;
$socket="";
$user="classicmodels";
$password="classicmodels";
$dbname="classicmodels";
$Code=$_GET["Code"];
// var_dump($Code);
$Code=explode(" ",$_GET["Code"]);
$Code[0]=(int)$Code[0];


$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "update employees set officeCode = $Code[1] where employeeNumber=$Code[0]";

$con->query($query);
if ($con->error){
    print "Ha habido un error en la modificación. Revisa los datos.";
}
else{
    print "El empleado ha sido modificado correctamente.";
}
$con->close();
?>
</body>
</html>
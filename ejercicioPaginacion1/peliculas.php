<html>
<head><title>Películas paginadas 1</title></head>
<body>
<table border=1>
<tr><th>Título</th><th>Descripción</th></tr>
<?php 
$host="10.10.0.3";
$port=3306;
$socket="";
$user="sakila";
$password="sakila";
$dbname="sakila";
if (isset($_GET['offset'])){
    $offset=$_GET['offset'];
    if ($_GET['accion']=="siguiente"){
        $offset+=10;
    }
    elseif ($_GET['accion']=="anterior") {
        $offset -=10;
    }
    if ($_GET['offset']<=0) {
        $offset=0;
    }
    elseif ($_GET['offset']>=1000) {
        $offset=990;
    }
    
}
else{
    $offset=0;
}


$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select title,description from film limit $offset,10;";

if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($title, $description);
    while ($stmt->fetch()) {
        printf("<tr><td>%s</td><td>%s</td></tr>", $title, $description);
    }
    $stmt->close();
}

$con->close();
?>
</table>
<br>
<?php 
echo "<a href='./peliculas.php?offset=$offset&accion=siguiente'>Aumentar 10</a>";
echo "<br>";
echo "<a href='./peliculas.php?offset=$offset&accion=anterior'>Disminuir 10</a>";
?>
</body>
</html>
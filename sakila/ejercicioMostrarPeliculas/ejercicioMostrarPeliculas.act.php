<html>
<head><title>Mostrar pel�culas por categor�a</title></head>
<body>
<?php 
// print_r($_GET);
$category_id=$_GET["category_id"];
include_once '../utils.php';
// $host="172.17.0.2";
// $port=3306;
// $socket="";
// $user="sakila";
// $password="sakila";
// $dbname="sakila";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

foreach ($category_id as $category) {
    echo "<table border='1'>";
    $query = "select name from category where category_id='$category'";
    $stmt = $con->query($query);
    while ($row = $stmt->fetch_assoc()){
        $name = $row["name"];
        printf("<th>%s</th>",$name);
    }
    $stmt->close();
    
    $query = "select film.title
from film,category,film_category  
where film.film_id=film_category.film_id 
and film_category.category_id='$category'
and film_category.category_id=category.category_id";
    
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($title);
        while ($stmt->fetch()) {
            printf("<tr><td>%s</td></tr>", $title);
        }
        $stmt->close();
    }
    echo "</table>";
}

$con->close();
?>
</body>
</html>
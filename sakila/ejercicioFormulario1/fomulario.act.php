<html>
<body>
<style type="text/css">
    tr:nth-child(even) {background-color: #e2ebf0;}
</style>
<table border="1">
<?php
$host="10.10.0.3";
$port=3306;
$socket="";
$user="sakila";
$password="sakila";
$dbname="sakila";
$category_id = $_GET['categoria'];

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());



$query1 = "select name from category where category_id='$category_id'";


if ($stmt1 = $con->prepare($query1)) {
    $stmt1->execute();
    $stmt1->bind_result($name);
    while ($stmt1->fetch()) {
        printf("<th>%s</th>", $name);
    }
    $stmt1->close();
}

$query = "select distinct film.title from film,film_category  
where film_category.category_id='$category_id'  
and film.film_id=film_category.film_id 
order by film.title";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($title);
    while ($stmt->fetch()) {
        printf("<tr><td>%s</td></tr>", $title);
    }
    $stmt->close();
}
?>
</table>
</body>
</html>
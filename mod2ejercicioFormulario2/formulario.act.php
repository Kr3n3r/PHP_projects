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
$film_id = $_GET['film_id'];

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query1 = "select title from film where film_id='$film_id';";


if ($stmt1 = $con->prepare($query1)) {
    $stmt1->execute();
    $stmt1->bind_result($name);
    while ($stmt1->fetch()) {
        printf("<th>%s</th>", $name);
    }
    $stmt1->close();
}

$query = "select last_name,first_name, actor.actor_id from actor,film_actor  
where film_actor.actor_id = actor.actor_id 
and film_actor.film_id=$film_id";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($last_name, $first_name, $actor_id);
    while ($stmt->fetch()) {
        printf("<tr><td><a href='./datosactor.php?actor_id=%s'>%s %s</a></td></tr>", $actor_id, $last_name, $first_name);
    }
    $stmt->close();
}
$con->close();
?>
</table>
</body>
</html>
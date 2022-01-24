<html>
<body>
<form method="get" action="datosactor.php">
<select name="actor_id">
<option value=""></option>
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

$query = "select last_name,first_name, actor.actor_id 
          from actor,film_actor  
          where film_actor.actor_id = actor.actor_id 
          and film_actor.film_id=$film_id";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($last_name, $first_name, $actor_id);
    while ($stmt->fetch()) {
        printf("<option value='%s'>%s %s</option>", $actor_id, $last_name, $first_name);
    }
    $stmt->close();
}
$con->close();
?>
</select>
<input type="submit">
</form>
</body>
</html>
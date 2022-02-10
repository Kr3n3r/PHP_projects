<?php
$host="10.10.0.3";
$port=3306;
$socket="";
$user="sakila";
$password="sakila";
$dbname="sakila";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
$con2 = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
$con3 = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select name,category_id from category order by name";
echo "<table border=1>";
$stmt = $con->prepare($query);
$stmt->execute();
$stmt->bind_result($name, $category_id);
while ($stmt->fetch()){
    echo "<tr style='color:#36c3fe;background-color:#3d3d3d'>";
    printf("<th>%s</th>", $name);
    echo "</tr>";
    //extrayendo informaci�n de pel�culas
    $query2="select distinct film.title,film.description,film.film_id from film,film_category 
where film_category.category_id=1 
and film.film_id=film_category.film_id order by film.title;";
    $stmt2 = $con2->prepare($query2);
    $stmt2->execute();
    $stmt2->bind_result($title, $description, $film_id);
    while ($stmt2->fetch()){
        echo "<tr style='color:#36c3fe;background-color:#3d3d3d'>";
        printf("<th>%s</th><th>%s</th>", $title,$description);
        echo "</tr>";
        //extrayendo informaci�n de actores
        $query3="select actor.first_name, actor.last_name from actor,film_actor where actor.actor_id=film_actor.actor_id and film_actor.film_id=$film_id;";
        $stmt3 = $con3->prepare($query3);
        $stmt3->execute();
        $stmt3->bind_result($nombre, $apellidos);
        while ($stmt3->fetch()){
            echo "<tr style='color:#f4f5ef;background-color:#6059f7'>";
            printf("<td>%s</td>", $apellidos);
            printf("<td>%s</td>", $nombre);
            echo "</tr>";
        }
        $stmt3->close();
    }
    $stmt2->close();
}
$stmt->close();

echo "</table>";


$con->close();
$con2->close();
$con3->close();
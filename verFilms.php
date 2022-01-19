<?php
include_once 'conection_w_host.php';
$host="172.17.0.2";


$query = "select name,category_id from category";
echo "<table>";
$stmt = $con->prepare($query);
$stmt->execute();
$stmt->bind_result($name, $category_id);
while ($stmt->fetch()){
    echo "<tr>";
    printf("<td>%s</td>", $name);
    echo "</tr>";
    //extrayendo información de películas
    $query2="select film.title,film.description,film.film_id from film,film_category where film_category.category_id=$category_id;";
    $stmt2 = $con->prepare($query2);
    $stmt2->execute();
    $stmt2->bind_result($title, $description, $film_id);
    while ($stmt2->fetch()){
        echo "<tr>";
        printf("<td>%s</td><td>%s</td>", $title,$description);
        echo "</tr>";
        //extrayendo información de actores
        $query3="select actor.first_name, actor.last_name from actor,film_actor where actor.actor_id=film_actor.actor_id and film_actor.film_id=$film_id;";
        $stmt3 = $con->prepare($query3);
        $stmt3->execute();
        $stmt3->bind_result($nombre, $apellidos);
        while ($stmt3->fetch()){
            echo "<tr>";
            printf("<td>%s</td>", $nombre);
            echo "</tr>";
            echo "<tr>";
            printf("<td>%s</td>", $apellidos);
            echo "</tr>";
        }
        $stmt3->close();
    }
    $stmt2->close();
}
$stmt1->close();

// echo "<table border=1>";
// if ($stmt = $con->prepare($query)) {
//     $stmt->execute();
//     $stmt->bind_result($title, $release_year);
//     while ($stmt->fetch()) {
//         echo "<tr>";
//         printf("<td>%s</td><td>%s</td>", $title, $release_year);
//         echo "</tr>";
//     }
//     $stmt->close();
// }
echo "</table>";


$con->close();
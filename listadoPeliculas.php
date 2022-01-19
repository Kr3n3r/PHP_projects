<?php
include_once 'conection.php';
$sql = "select name,category_id from category;";
$result->execute();
$result->bind_result($name,$category_id);
echo "<table>";
while($result->fetch()){
//     printf("<tr><td></td></tr>",);
       printf("<tr><th>%s</th></tr>",$name);
       $sql2="select film.film_id,film.name 
       from film,film_category 
       where film.film_id=film_category.film_id 
       and film_category.category_id=$category_id;";
}
echo "</table>";
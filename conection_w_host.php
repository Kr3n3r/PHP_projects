<?php
$host="";
$port=3306;
$socket="";
$user="sakila";
$password="sakila";
$dbname="sakila";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
?>
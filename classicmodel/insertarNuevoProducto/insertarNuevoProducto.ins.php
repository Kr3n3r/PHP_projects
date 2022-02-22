<?php 
$ProductCode=$_GET["newProductCode"];
$quantity=$_GET["newquantity"];
$host="172.17.0.2";
$port=3306;
$socket="";
$user="classicmodels";
$password="classicmodels";
$dbname="classicmodels";
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());



$con->close();
?>
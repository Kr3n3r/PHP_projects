<?php
function catchRequired($VALUE){
    if(!isset($_GET[$VALUE]) && !isset($_POST[$VALUE]) ){
        die("Falta el parámetro $VALUE y es requerido");
    }
    if(empty($_GET[$VALUE]) && empty($_POST[$VALUE]) ){
        die("El parámetro $VALUE está vacío y es requerido");
    }
    global ${$VALUE};
    if (${$VALUE} = $_GET[$VALUE]){}
    else{
        ${$VALUE} = $_POST[$VALUE];
    }
    return;
}

function catched($VALUE){
    if(!isset($_GET[$VALUE]) && !isset($_POST[$VALUE]) ){
        die("Falta el parámetro $VALUE y es requerido");
    }
    global ${$VALUE};
    ${$VALUE}= !empty($_GET[$VALUE]) ? "'${$VALUE}'" : "NULL";
    return;
}

$host="172.17.0.2";
$port=3306;
$socket="";
$user="sakila";
$password="sakila";
$dbname="sakila";

// $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
// or die ('Could not connect to the database server' . mysqli_connect_error());
?>
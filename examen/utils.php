<?php 
function catchRequired($VALUE){
    if(!isset($_GET[$VALUE]) && !isset($_POST[$VALUE]) ){
        die("Falta el parámetro $VALUE y es requerido");
    }
    if(empty($_GET[$VALUE]) && empty($_POST[$VALUE]) ){
        die("El parámetro $VALUE está vacío y es requerido");
    }
    if ($_GET[$VALUE]){
        return $_GET["${VALUE}"];
    }
    else{
        return $_POST["${VALUE}"];
    }
}

function catched($VALUE){
    if(!isset($_GET[$VALUE]) && !isset($_POST[$VALUE]) ){
        die("Falta el parámetro $VALUE y es requerido");
    }
    if ($_GET[$VALUE]){
        return $_GET["${VALUE}"];
    }
    else{
        return $_POST["${VALUE}"];
    }
}
?>
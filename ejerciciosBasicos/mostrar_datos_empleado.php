<?php
    echo "<pre>";
    print_r($_POST);
    // es muy recomendable recoger los valores en variables que van a clarificar el código y volverlo más sencillo
    // var_dump($_POST);
    // $conocimientos=string;
    // foreach ($_POST["conocimientos"] as $conocimiento) {
    // $conocimientos+=$conocimiento;
    // };
    $reduccion_jornada = $_POST["reduccion"];
    $es_jefe = $_POST["jefe"];
    echo "El dni es " . $_POST["dni"] . "<br>";
    echo "Los apellidos son " . $_POST["apellidos"] . "<br>";
    echo "El nombre es " . $_POST["nombre"] . "<br>";
    echo "El sueldo es " . $_POST["sueldo"] . "<br>";
    echo "La categoría es" . $_POST["categoría"] . "<br>";
    if (isset($reduccion_jornada)) {
        echo "El empleado tiene reducción de jornada" . "<br>";
    } else {
        echo "El empleado NO tiene reducción de jornada" . "<br>";
    }
    if (isset($es_jefe)) {
        echo "El empleado es el jefe" . "<br>";
    } else {
        echo "El empleado NO es el jefe" . "<br>";
    }
    echo "Los conocimientos son " . $_POST["conocimientos"] . "<br>";
    echo "El departamento es " . $_POST["departamento"] . "<br>";
    $conexion=mysqli_connect("10.10.0.3", "usuario", "usuario", "usuario", 3306);
    $return=mysqli_close($conexion);
    echo $return;
//     $error=mysqli_error($conexion);
//     echo $error;
?>
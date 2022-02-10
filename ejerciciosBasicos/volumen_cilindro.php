<html>
<body>

<?php 
    $pi=pi();
    $radio=$_GET["radio"];
    $altura=$_GET["h"];
    $volumen=$pi * ($radio ^ 2) * $altura;
    ///$volumen=pi() * $_GET["radio"] * $_GET["radio"] * $_GET["h"];
    echo "El volumen del cilindro es $volumen";
?>
</body>
</html>
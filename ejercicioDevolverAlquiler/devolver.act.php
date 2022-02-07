<html>
<head><title>Devolución final</title></head>
<body>
<?php 
include_once '../utils.php';
catchRequired("rental_id");

$query = "update rental set return_date=now() where rental_id=$rental_id";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    echo "Devolución realizada.";
}
else{
    echo "Devolución no realizada.";
}
$stmt->close();
$con->close();
?>
</body>
</html>
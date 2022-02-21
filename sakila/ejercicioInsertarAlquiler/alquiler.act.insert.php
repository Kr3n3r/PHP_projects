<html>
<head><title>Inserción final</title></head>
<body>
<?php 
include_once '../utilswindows.php';
catchRequired("customer_id");
catchRequired("inventory_id");
catchRequired("staff_id");
// $customer_id=$_GET["customer_id"];
// $inventory_id=$_GET["inventory_id"];
// $staff_id=$_GET["staff_id"];

$query = "insert into rental(inventory_id,customer_id,staff_id) values('$inventory_id','$customer_id','$staff_id');";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    echo "Inserción realizada.";
}
else{
    echo "Inserción no realizada.";
}
$stmt->close();
$con->close();
?>
</body>
</html>
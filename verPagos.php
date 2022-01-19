<?php
$host="10.10.0.3";
$port=3306;
$socket="";
$user="sakila";
$password="sakila";
$dbname="sakila";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "select first_name,last_name,customer_id from customer order by last_name,first_name;";

echo "<table border=1>";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name,$customer_id);
    while ($stmt->fetch()) {
        echo "<tr>";
        printf("<td>%s</td><td>%s</td>", $first_name, $last_name);
        echo "</tr>";
        $query2 = "select payment.payment_date, payment.amount from payment where customer_id=$customer_id";
        $total_amount=0;
        
        if ($stmt2 = $con->prepare($query2)) {
            $stmt2->execute();
            $stmt2->bind_result($payment_date, $amount);
            while ($stmt2->fetch()) {
                $total_amount+=$amount;
                printf("<tr><td>%s</td><td>%s</td></tr>", $payment_date, $amount);
            }
            $stmt2->close();
        }
        printf("<tr><td>Total amount</td><td>%s</td></tr>",$total_amount);
    }
    $stmt->close();
}
//mostrar todos los pagos del cliente

echo "</table>";
$con->close();

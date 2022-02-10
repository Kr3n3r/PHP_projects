<?php
include_once 'conection.php';
$query = "select payment.payment_date,customer.first_name,customer.last_name,payment.amount,sum(payment.amount)  from customer,payment  where customer.customer_id=payment.payment_id group by payment.customer_id order by sum(payment.amount)";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($payment_date, $first_name, $last_name, $amount, $amount1);
    while ($stmt->fetch()) {
        printf("%s, %s, %s, %s, %s\n", $payment_date, $first_name, $last_name, $amount, $amount1);
    }
    $stmt->close();
}
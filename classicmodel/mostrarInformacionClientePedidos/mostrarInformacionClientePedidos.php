<?php 
$host="10.10.0.3";
$port=3306;
$socket="";
$user="classicmodels";
$password="classicmodels";
$dbname="classicmodels";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
?>
<html>
<table>
	<?php 
	$query = "select customers.customerName , 
sum(payments.amount) as amount,
customers.customerNumber
from customers,payments 
where customers.customerNumber=payments.customerNumber 
group by customers.customerName";
	$stmt = $con->query($query);
	while ($row = $stmt->fetch_assoc()) {
	    $customerName = $row["customerName"];
	    $amount = $row["amount"];
	    $customerNumber = $row["customerNumber"];
        printf("<tr><th>%s</th><th>%s</th></tr>", $customerName, $amount);
        
        $query2 = "select orderDate,orderNumber from orders where customerNumber=$customerNumber";
        $stmt2 = $con->query($query2);
        while ($row2 = $stmt2->fetch_assoc()) {
            $orderDate = $row2["orderDate"];
            $orderNumber = $row2["orderNumber"];
            printf("<tr><td colspan='0.6'>%s</td><td>%s</td></tr>", $orderDate, $orderNumber);
            
            $query3 = "select products.productName, 
orderdetails.quantityOrdered 
from products,orderdetails,orders 
where products.productCode = orderdetails.productCode 
and orders.orderNumber=orderdetails.orderNumber 
and orders.orderNumber=$orderNumber 
and orders.customerNumber=$customerNumber";
            $stmt3 = $con->query($query3);
            while ($row = $stmt3->fetch_assoc()) {
                $productName = $row["productName"];
                $quantityOrdered = $row["quantityOrdered"];
                printf("<tr><td>%s</td><td>%s</td></tr>", $productName, $quantityOrdered);
            }
            $stmt3->close();
        }
        $stmt2->close();
    }
    $stmt->close();
	?>

</table>



</html>
<?php 
    $con->close();
?>
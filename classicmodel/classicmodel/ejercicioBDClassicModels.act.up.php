<?php
var_dump($_GET);
include_once 'utils.php';
catched('lastName');
catched('firstName');
catched('extension');
catched('email');
catched('officeCode');
catched('reportsTo');
catched('jobTitle');
catched('employeeNumber');
$str_fields=array('lastName','firstName','extension','email','officeCode','jobTitle');
$num_fields=array('reportsTo');
$null_fields=array('reportsTo');
$up_fields=array();
foreach ($str_fields as $element) {
    if (!is_null(${$element})) {
        array_push($up_fields,$element);
    }
    if (is_null(${$element}) && in_array($element, $null_fields)){
        array_push($up_fields,$element);
        ${$element} = "NULL";
    }
}
foreach ($num_fields as $element) {
    ${$element} = intval(${$element});
    if (!is_null(${$element})){
        array_push($up_fields,$element);
    }
    if (is_null(${$element}) && in_array($element, $null_fields)){
        array_push($up_fields,$element);
        ${$element} = "NULL";
    }
}
 
// print_r($up_fields);
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
foreach ($up_fields as $field_that_is_going_to_be_updated) {
    if (is_string($field_that_is_going_to_be_updated)){
        $query = "update  	
                    employees  
                  set
                  	$field_that_is_going_to_be_updated = '${$field_that_is_going_to_be_updated}' 
                  where employeeNumber=$employeeNumber";
    }
    elseif (is_int($field_that_is_going_to_be_updated)) {
        $query = "update
                    employees
                  set
                  	$field_that_is_going_to_be_updated = ${$field_that_is_going_to_be_updated} 
                  where employeeNumber=$employeeNumber";
    }
    
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->close();
    }
}
?>
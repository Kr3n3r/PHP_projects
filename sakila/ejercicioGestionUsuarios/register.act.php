<?php 
include_once '../utilswindows.php';
function randomPassword(){
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, strlen($alphabet)-1);
        $pass[$i] = $alphabet[$n];
    }
    return $pass;
}
$user='root';
$password='root';
$dbname='';
catchRequired("username");
catchRequired("email");
$user_password = randomPassword();
$user_password = implode("", $user_password);
echo $user_password;
$user_password = md5($user_password);
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
$query = "create user $username identified by '$user_password';";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    if (!$stmt->error){
    $stmt->close();
    mail($email,
        "Alta usuario $username",
        "Su usuario $username ha sido dado de alta. Su contraseña es $user_password.");
    }
    else{
        echo 'No se puede registrar al usuario "'.$username.'" : Nombre no válido';
    }
}
// sleep(5);
$con->close();
?>
<br>
<a href="register.php">GO</a>
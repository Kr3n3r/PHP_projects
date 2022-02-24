<html>
<head>
	<title>Formulario para elegir categorías</title>
</head>
<body>
<form method="get" action="ejercicioMostrarPeliculas.act.php">
	<select name="category_id[]" multiple>
	<?php 
// 	include_once '../utilswindows.php';
	$host="172.17.0.2";
	$port=3306;
	$socket="";
	$user="sakila";
	$password="sakila";
	$dbname="sakila";
	
	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());
	
	$query = "select category_id,name from category";
	
	
	if ($stmt = $con->prepare($query)) {
	    $stmt->execute();
	    $stmt->bind_result($category_id, $name);
	    while ($stmt->fetch()) {
	        printf("<option value='%s'>%s</option>", $category_id, $name);
	    }
	    $stmt->close();
	}
	$con->close();
	?>
	</select>
	<br>
	<input type="submit">
</form>


</body>
</html>
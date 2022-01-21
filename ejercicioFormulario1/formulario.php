<html>
<head><title>Formulario vista películas</title></head>
<body>
	<form action="fomulario.act.php" method="get">
		<select name="categoria">
			<option value="">
			<?php 
			$host="10.10.0.3";
			$port=3306;
			$socket="";
			$user="sakila";
			$password="sakila";
			$dbname="sakila";
			
			$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
			or die ('Could not connect to the database server' . mysqli_connect_error());
			$query = "select name,category_id from category order by name";
			
			
			if ($stmt = $con->prepare($query)) {
			    $stmt->execute();
			    $stmt->bind_result($name, $category_id);
			    while ($stmt->fetch()) {
			        printf("<option value='%s'>%s</option>", $category_id,$name);
			    }
			    $stmt->close();
			}
			$con->close();
			?>
		</select>
		<input type="submit">
	</form>
</body>
</html>

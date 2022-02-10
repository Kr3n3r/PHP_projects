<html>
	<head></head>
	<body>
		<h1>Formulario de datos</h1>
		<form method="post" action="mostrar_datos_empleado.php">
			<p>Dni <input type="text" name="dni">
			<p>Apellidos<input type="text" name="apellidos">
			<p>Nombre<input type="text" name="nombre">
			<p>Sueldo<input type="text" name="sueldo">
			<p>Categoría
			<p><input type="radio" name="categoria" value="analista">analista
			<p><input type="radio" name="categoria" value="programador">programador
			<p><input type="radio" name="categoria" value="operador">operador
			<p><input type="checkbox" name="reduccion">Reduccion de jornada
			<p><input type="checkbox" name="jefe">Jefe de proyecto
			<p>Conocimientos
			<p><select name="conocimientos[]" multiple>
    			<option value="java">java
    			<option value="php">php
    			<option value="asp">asp
    			<option value="c">c
			</select>
			<p><select name="departamento" size=3>
				<option value="desarrollo">desarrollo
				<option value="administracion">administración
				<option value="contabilidad">contabilidad</select>
			<p><select name="departamento" >
				<option value="">
				<option value="universitaria">universitaria
				<option value="superior">FP superior
				<option value="bachillerato">bachillerato</select>
			<p><input type="submit">
		</form>
	
	</body>
</html>

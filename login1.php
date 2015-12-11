<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 	
<!--Para que podamos usar acentos y caracteres raros -->
<head><title> Login </title></head>

<body>
        	
			<?php 
			
			// Si sabemos que no necesitamos cambiar nada de la sesión,
			// podemos simplemente leerla y cerrarla inmediatamente para evitar
			// bloquear el fichero de sesión y otras páginas
			
			// La vida de nuestra cookie será de 10 minutos
			session_start();
			
			//Generación de variables para conexión a Base de Datos
			$server = "mysql.hostinger.es";
			$user = "u347232914_root"; 		
			$password = "root123"; 	
			$bd_name = "u347232914_quiz";
						
					
			//Conexión de Base de Datos	 
			$connection = new mysqli($server, $user, $password, $bd_name);
		 
			// Check connection
			if ($connection->connect_error) {
			    die("Connection failed: " . $connection->connect_error);
			} 	 
			
			//generamos la sentencia sql para insertar los datos
			$sql = "SELECT password FROM usuario WHERE email = '" . $_POST['email'] . "' and password = '" . $_POST['password'] . "'";	
			
				if ($connection->query($sql) === TRUE) {
				echo "Usuario conectado con éxito.";
				} 
				else {
				echo "Error: Este usuario o contraseña es incorrecto";
				echo "Error: " . $sql . "<br>" . $connection->error;
				
				}	
			$connection->close();
		 ?>
		 
		<br>
		<a href="layout.html">Volver</a>
		
</body>
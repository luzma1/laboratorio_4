  	
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
			
			//$server = "localhost";
			//$user = "root"; 		
			//$password = "root"; 	
			//$bd_name = "Quiz";
			
			
					
			//Conexión de Base de Datos	 
			$connection = new mysqli($server, $user, $password, $bd_name);
		 
			// Check connection
			if ($connection->connect_error) {
			    die("Connection failed: " . $connection->connect_error);
			} 	 
			
			//generamos la sentencia sql para insertar los datos
			$sql = "SELECT password FROM usuario WHERE email = '" . $_POST['email'] . "' and password = '" . $_POST['password'] . "'";	
			//el query en el caso de encontrar una consulta nos devuelve una estructura
			$result=$connection->query($sql);
			
			//cerramos la conexion
			$connection->close();
			
			
			//VER POR QUE LOS HEADERS NO REDIRIGEN
			
			if ($result->num_rows > 0)
				{
				echo "Usuario conectado con éxito.";
				$_SESSION["email"] = $_POST['email'];
				header("location:layout.html");
				
				} 
				else {
				echo "Error: Este usuario o contraseña es incorrecto";
				echo "Error: " . $sql . "<br>" . $connection->error;				
				}	
			
		 ?>
		 

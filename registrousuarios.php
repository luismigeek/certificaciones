<?php
session_start();

if (!isset($_SESSION['usuario'])) {
	header("location: login.php");
}
?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="	UTF-8">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<title>Registro de Usuarios | Sistema de Certificaciones para Comunidades Indigenas</title>
	<link rel="stylesheet" type="text/css" href="css/Registro_Usuarios.css">
</head>

<body>
	<header>
		<div style="float:right; margin: 3px 3px 0px 0px;">
			<?php echo $_SESSION['usuario'] ?> | <button class="btn btn-danger" id="btn_salir">Salir</button>
		</div>
		<div id="action_salir"></div>

		<img src="imagenes/ministerio.png" width="100" alt="Logotipo">
		</div>
		<nav>
			<ul>
				<li><a href="index.php">Inicio</a></li>
			</ul>
		</nav>
	</header>
	<section class="contenedor">
		<section class="articles">
			<article>
				<h2>Registro de usuarios</h2>
				<p>Todos los campos se deben diligenciar y son requeridos para realizar el registro exitoso de los ususarios del sistema.</p>
				<form action="app/registrousuario.php" method="POST" id="form_reg_user">

					<label for="tipo">Tipo Documento:</label>
					<select class="form-control" name="tipo" id="tipo">
						<option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
						<option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
						<option value="Cedula Extranjera">Cedula Extranjera</option>
					</select>
					<br><br><br>

					<label for="numero">Numero Documento:</label>
					<input class="form-control" type="number" maxlength="10" id="numero" required name="id">
					<br><br>

					<label for="nombre">Nombres:</label>
					<input class="form-control" type="text" maxlength="40" id="nombre" required name="name">
					<br><br>

					<label for="apellido">Apellidos:</label>
					<input class="form-control" type="text" maxlength="40" id="apellido" required name="ape">
					<br><br>

					<label for="celular">Numero Celular:</label>
					<input class="form-control" type="tel" maxlength="10" id="celular" required name="cel">
					<br><br>

					<label for="usuario">Usuario:</label>
					<input class="form-control" type="text" maxlength="20" id="usuario" required name="usuario">
					<br><br>

					<label for="email">Email:</label>
					<input class="form-control" type="email" maxlength="50" id="email" required name="email">
					<br><br>
					<br>

					<label for="pass">Contraseña:</label>
					<input class="form-control" type="password" placeholder="password" maxlengh="20" id="pass" required name="pass">
					<br><br>
					<br>

					<label for="pass2">Confirmar Contraseña:</label>
					<input class="form-control" type="password" placeholder="password" maxlengh="20" id="pass2" required name="pass2">
					<br><br><br><br>

					<input class="btn btn-info" type="button" id="submit_reg_user" value="Guardar">
				</form>

				<br><br>

				<center><strong>
						<div id="msg_usuario" style="color:red"></div>
					</strong></center>

			</article>

		</section>
		<aside>
			<div>
				<img src="imagenes/img3.jpg" width="272" height="186" alt="Logotipo">
			</div>
			<br><br>
			<div>
				<img src="imagenes/indigena1.jpg" width="274" height="190" alt="Logotipo">
			</div>
			<br>
		</aside>
	</section>

	<footer>
		<p>Todos los Derechos Reservados</p>
	</footer>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="js/logic.js"></script>
</body>

</html>
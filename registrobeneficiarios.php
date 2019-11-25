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
	<title>Registro Beneficiarios FAUCH | Sistema de Certificaciones para Comunidades Indigenas</title>
	
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/Registro_Beneficiarios.css">
</head>

<body>
	<header>
		<div>
			<div style="float:right; margin: 3px 3px 0px 0px;">
				<?php echo $_SESSION['usuario'] ?> | <button class="btn btn-danger" id="btn_salir">Salir</button>
			</div>
			<div id="action_salir"></div>

			<img src="imagenes/ministerio.png" width="100" alt="Logotipo">
		</div>
		<nav>
			<ul>
				<li><a href="generarcertificados.php">Generar Certificados</a></li>
				<li><a href="http://datos.mininterior.gov.co/Indigenas/index" target="_blank" rel="noopener noreferrer">Consulta SIIC | Min Interior</a></li>
				<li><a href="index.php">Inicio</a></li>
			</ul>
		</nav>
	</header>
	<section class="contenedor">

		<section class="articles">
			<article>
				<h2>Datos Básicos del Beneficiario</h2>
				<p>Todos los campos se deben diligenciar y son requeridos para realizar el registro exitoso de los datos del beneficiario.</p>
				<br>
				<form id="form_reg_ben" method="POST">

					<div class="form">
						<label for="tipo">Tipo Documento:</label>
						<select class="form-control" name="tipo" id="tipo">
							<option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
							<option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
							<option value="Cedula Extranjera">Cedula Extranjera</option>
						</select>
						<br><br>
						<br><br>

						<label for="id">Numero Documento:</label>
						<input class="form-control" style="width:172px" type="number" maxlength="10" id="id" required name="id">
						<br><br>

						<label for="lugarexp">Lugar de Expedición:</label>
						<input class="form-control" style="width:172px" type="text" maxlength="50" id="lugarexp" required name="lugarexp">
						<br><br>

						<label for="name">Nombres:</label>
						<input class="form-control" style="width:172px" type="text" maxlength="40" id="name" required name="name">
						<br><br>

						<label for="ape">Apellidos:</label>
						<input class="form-control" style="width:172px" type="text" maxlength="40" id="ape" required name="ape">
						<br><br>

						<label for="fechanac">Fecha de Nacimiento:</label>
						<input class="form-control" style="width:172px" type="date" id="fechanac" required name="fechanac">
						<br><br>

						<label for="celular">Numero Celular:</label>
						<input class="form-control" style="width:172px" type="tel" maxlength="10" id="celular" required name="celular">
						<br><br>

						<label for="email">Correo Electronico:</label>
						<input class="form-control" style="width:172px" type="email" required id="email" name="email">
					</div>

					<br><br>
					<hr>
					<br><br>
					<h2>Proyecto Comunitario</h2>
					<p>Todos los campos se deben diligenciar y son requeridos para realizar el registro exitoso de los datos del proyecto comunitario.</p>
					<br>

					<div class="form">
						<label for="proyecto">Titulo del Proyecto: </label>
						<input class="form-control" style="width:172px" type="text" maxlength="200" id="proyecto" required name="proyecto">
						<br><br><br>

						<label for="desc">Descripción:</label>
						<input class="form-control" style="width:172px" type="text" maxlength="200" id="desc" required name="desc">
						<br><br><br>

						<label for="objgen">Objetivo General:</label>
						<input class="form-control" style="width:172px" type="text" maxlength="200" id="objgen" required name="objgen">
						<br><br><br>

						<label for="objesp">Objetivos Especificos:</label>
						<input class="form-control" style="width:172px" type="text" maxlength="200" id="objesp" required name="objesp">
						<br><br><br>
						<input type="button" class="btn btn-info" id="submit_reg_ben" value="Guardar">
					</div>
				</form>

				<br><br>

				<center><strong><div id="msg_ben" style="color:red"></div></strong></center>

			</article>
		</section>

		<aside>
			<div>
				<img src="imagenes/sombrero.jpg" width="255" alt="Logotipo">
			</div>
			<p>“A los jóvenes los invito a estudiar y a luchar fuertemente sin cansarse, Ojalá no les dé pena ser indígenas.</p>
			<q>Álvaro Ulcué Chocué</q>
			<br><br>
			<div>
				<img src="imagenes/indigena1.jpg" width="262" height="193" alt="Logotipo">
			</div>
			<br>
			<div>
				<img src="imagenes/indigena2.jpg" width="262" height="193" alt="Logotipo">
			</div>
			<br>
			<div>
				<img src="imagenes/indigena3.jpg" width="262" height="192" alt="Logotipo">
			</div>
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
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
	<title>Consultar Beneficiarios - Sistema de Certificaciones</title>
	<link rel="stylesheet" type="text/css" href="css/Consultar_Beneficiarios.css">
</head>

<body>
	<header>
		<div>
			<div style="float:right; margin: 20px 20px 0px 0px;">
				<?php echo $_SESSION['usuario'] ?> | <button id="btn_salir">Salir</button>
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
				<h2>Consultar Beneficiarios</h2>
				<p>Digite el tipo y número de Identificación del beneficiario.</p>
				<br>
				<form>
					<label for="tipo">Tipo Documento:</label>
					<select tipo="" id="tipo">
						<option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
						<option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
						<option value="Cedula Extranjera">Cedula Extranjera</option>
					</select>
					<br><br>

					<label for="numero">Numero Documento:</label>
					<input type="number" maxlength="10" id="numero">
					<br><br>

					<input type="button" value="Consultar">
					<br><br>
				</form>
			</article>

		</section>
		<aside>
			<div>
				<img src="imagenes/img1.jpg" width="272" height="173" alt="Logotipo">
			</div>
			<br>
			<div>
				<img src="imagenes/img2.jpg" width="272" height="182" alt="Logotipo">
				<br>
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
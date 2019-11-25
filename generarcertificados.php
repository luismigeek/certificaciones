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
	<title>Generar Certificados - Sistema de Certificaciones</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/Generar_Certificados.css">
</head>

<body>
	<header>
		<div>
			<div style="float:right; margin: 3px 3px 0px 0px;">
				<?php echo $_SESSION['usuario'] ?> | <button id="btn_salir" class="btn btn-danger"> Salir</button>
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
			<article id="vistaPrevia">
			</article>
		</section>
		<aside>
			<h2>Generar Certificados</h2>
			<p>Seleccione el tipo de Certificado seguido del tipo y número de documento del interesado.</p>

			<form id="form_gen_cer" action="#">
				<label for="tipo">Tipo de certificado:</label>
				<select name="tipo_cer" class="form-control" id="tipo">
					<option value="Libreta militar">Libreta Militar</option>
					<option value="Aval Alvaro Ulcué Chocué">Aval Alvaro Ulcué Chocué</option>
					<option value="Ficha censal familiar">Ficha censal familiar</option>
					<option value="Linea Protección Constitucional">Linea Protección Constitucional</option>
				</select>
				<br><br><br>

				<label for="tipo">Tipo Documento:</label>
				<select name="tipo_doc" class="form-control" id="tipo">
					<option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
					<option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
					<option value="Cedula Extranjera">Cedula Extranjera</option>
				</select>
				<br><br><br>

				<label for="numero">Numero Documento:</label>
				<input type="text" class="form-control" maxlength="10" id="numero" name="numero">
				<br><br><br>

				<input type="button" class="btn btn-info" id="submit_gen_cer" value="Generar Certificado">
			</form>

			<br><br>
			<center><div id="msg_gen_cer" style="color:red"></div></center>

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
<?php 
include("conexion.php");
session_start();
if (!isset($_SESSION['id_usuario'])) {
	header("Location: index.php");
}
$iduser=$_SESSION['id_usuario'];
$query = mysqli_query($conexion, "SELECT autor, titulo, descripcion, idusuarios, iddiscusiones FROM discusioness");
$row = mysqli_fetch_all($query); 
$rows = $query->num_rows; 
$prueba = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estilos.css">
	<title>Inicio</title>
</head>
<body>
	<div class="barra">
			<div class="boton">
			<a  href="salir.php"> Salir</a>
			</div>

			<div class="mg">
			<img class="img" src="imagenes/pato.png" alt="cargando...">
			</div>

		</div>
	<div class="contenedor">

	<p class="mov">Discusiones</p>

	<a class="centrado" href="creardiscusion.php">Crear Discusion</a>
		<div>

	<?php
	if($rows>0){
		
		for ($i=0; $i < $rows; $i++) { 
			echo '
			<div>
				<article class="discu">
					<p class="tit"> 
						<a class="b" href="discusiones.php?discusion='.$row[$i][4].'">'
								.utf8_decode($row[$i][1]).					
								'
						</a>
					</p>
					<p class="aut">
						<a" href="discusiones.php?usuario='.$row[$i][3].'">'
								.utf8_decode($row[$i][0]).					
								'
						</a>
					</p>
					<p class="text">'.utf8_decode($row[$i][2]).'
					</p>
				</article>
					
			</div>';
		}
	}?>

			
	</div>
		<!-- 
		<div class="texto">
		*/
			<h2>
				Bienvenido,<?php
				echo utf8_decode($row['Nombre']); ?> ! 
				</h2>
				<h2>
				¡¡Gracias por registrarse!!
			</h2>

		
		</div>
				-->

	</div>
	
</body>
</html>
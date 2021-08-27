<?php 
include("conexion.php");
session_start();
if (!isset($_SESSION['id_usuario'])) {
	header("Location: index.php");
}
$id_discusion = $_GET['discusion'];
$iduser=$_SESSION['id_usuario'];
$query = mysqli_query($conexion, "SELECT titulo,descripcion,autor FROM discusioness WHERE iddiscusiones= $id_discusion");
$sql="SELECT Usuario FROM usuarios WHERE idusuarios='$iduser'";
$respuestaa= "SELECT autor,respuesta FROM respuestas WHERE iddiscusiones=$id_discusion";
$respuestx = $conexion->query($respuestaa);
$rowa = mysqli_fetch_all($respuestx);
$resultado = $conexion->query($sql);
$rowx = $resultado->fetch_assoc();
$row = mysqli_fetch_all($query); 
$rows = $query->num_rows;
$distancia = $respuestx->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	
	<title>Discusiones</title>
</head>
<body>
<div class="barra">
			<div class="boton1">
			<a class="dif" href="salir.php"> Salir</a>
			</div>

			<div class="imagen">
			<img class="img" src="imagenes/pato.png" alt="cargando...">
			</div>

		</div>
<div class="contenedor">
		<?php
		echo "<h1 class='mov'>Discusión</h1>";
	if($rows>0){
		
		for ($i=0; $i < $rows; $i++) { 
				echo '
	 			<div class="midisc"><h2 class="aa">';
	 			echo utf8_decode($row[$i][0]);	
	 			echo '<h2 class="aa1"></p>
	 			<span><p>';
	 			echo utf8_decode($row[$i][1]);
	 			echo '</p><h2 class="autor">';
	 			echo utf8_decode($row[$i][2]);
	 			echo '</h2></span>
	 			</div>';
				}}?>
		
		<div class="res">

			<div class="tex">
				<h1 class="mov" id="mov">Comentar: </h1>
			<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" >
			<span><textarea type="text" style="margin: 10px; width: 690px; height: 191px;" name="respuesta"></textarea>
			</span><button class="dif" type="submit" name="crear" class="button">
													<span class="bigger-110">Crear repuesta</span>
													</button>
												</form>
												<?php
								 					if(isset($_POST["crear"])){
								 					$iddiscusion = $id_discusion;
								 					$usuario = $rowx['Usuario'];
								 					$respuesta = mysqli_real_escape_string($conexion,$_POST['respuesta']);
								 					$sqldiscusion = "INSERT INTO respuestas(iddiscusiones,autor,respuesta)
        											VALUES ('$iddiscusion','$usuario','$respuesta')";
        											 $resultadodiscusion = $conexion->query($sqldiscusion);
								 					}
								 						?>
													
 			<?php
 			for ($i=0; $i < $distancia; $i++) { 
 			echo '<article><h2>';
			echo utf8_decode ($rowa[$i][0]);
			echo '</h2><span><p>';
			echo utf8_decode($rowa[$i][1]);
			echo '</p></span>';
			echo '</article>';
}
 			?>
			</div>
		</div>
		<div class="bot2">
			<a class="dif2" href="admin.php"> Volver</a>
			</div>
	</div>
	
</body>
</html>
<?php 
include("conexion.php");
session_start();
if (!isset($_SESSION['id_usuario'])) {
	header("Location: index.php");
}
$iduser=$_SESSION['id_usuario'];
$sql="SELECT idusuarios, Usuario FROM usuarios WHERE idusuarios='$iduser' ";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();


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
	<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" >
		<div class="contenedor">											
									
							<p class="mov1" >Crear Discusion</p>
											<?php
											echo "<div class='dise'>";
				echo utf8_decode($row['Usuario']);
				echo "</div>";
				?> 
													<div class="s">
														<span>	
															<input  style="margin: 0px; width: 540px; height: 30px;"   type="text"  name="titulo" placeholder="Titulo" required="" />
													</input>

														</span>	
							 <p class="dise1">Descripción:</p>
								 					<textarea  type="text" style="margin: 0px; width: 690px; height: 191px;" name="descripcion"></textarea>
													<button type="submit" name="crear" class="button">
													<span class="bigger-110">Crear Discusion</span>
													</button>
													</div></div>
											</form>
											<?php
								 					if(isset($_POST["crear"])){
    												$titulo = mysqli_real_escape_string($conexion,$_POST['titulo']);
    												$descripcion = mysqli_real_escape_string($conexion,$_POST['descripcion']);
    												$idusuario = $row['idusuarios'];
    												$autor = $row['Usuario'];
                                                    $sqldiscusion = "INSERT INTO discusioness(idusuarios,autor,titulo,descripcion)
        											VALUES ('$idusuario','$autor','$titulo','$descripcion')";
        											 $resultadodiscusion = $conexion->query($sqldiscusion);
        											if ($resultadodiscusion> 0) {
           											echo "<script>
            										alert('Discusion creada')
           											 window.location = 'admin.php'
           											 </script>";
       												 }
       												 else
       												 {
           											 echo "<script>
           											 alert('Error al crear la discusion')
         											   window.location = 'creardiscusion.php'
         											   </script>";
        												}
    													}
   													 ?>	
														<div class="boton">
			<a  href="admin.php"> Volver</a>
			</div>
	
	
</body>
</html>
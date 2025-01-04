<?php
include("../../bd.php");

if($_POST){
	$icono = (isset($_POST['icono']) ? $_POST['icono'] : "");
	$titulo = (isset($_POST['titulo']) ? $_POST['titulo'] : "");
	$descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : "");
	$sql = "INSERT INTO tbl_servicios (ID, icono, titulo, descripcion) VALUES (NULL, :icono, :titulo, :descripcion)";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":icono", $icono);
	$consulta->bindParam(":titulo", $titulo);
	$consulta->bindParam(":descripcion", $descripcion);
	$consulta->execute();
	$mensaje = "Registro agregado con exito.";
	header("location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php"); 
?>

<div class="card">
	<div class="card-header">
		Crear servicios
	</div>
	<div class="card-body">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="mb-3">
				<input class="form-control" type="text" name="icono" id="icono" placeholder="Icono" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="titulo" id="titulo" placeholder="Titulo" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="descripcion" id="descripcion" placeholder="Descripción" autocomplete="off" required />
			</div>

			<button class="btn btn-success btn-sm" type="submit" role="button">Agregar</button>
			<a class="btn btn-primary btn-sm" name="" id="" href="index.php" role="button">Cancelar</a>
		</form>
	</div>
</div>

<?php include("../../templates/footer.php"); ?>
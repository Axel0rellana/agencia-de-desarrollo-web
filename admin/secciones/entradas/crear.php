<?php
include("../../bd.php");

if($_POST){
	$fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : "");
	$titulo = (isset($_POST['titulo']) ? $_POST['titulo'] : "");
	$descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : "");
	$imagen = (isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : "");
	$fecha_imagen = new DateTime();
	$nombreArchivo_imagen = (($imagen != "") ? $fecha_imagen->getTimestamp()."_".$_FILES['imagen']['name'] : "");
	$tmp_imagen = $_FILES['imagen']['tmp_name'];
	if($tmp_imagen != ""){
		move_uploaded_file($tmp_imagen, "../../../assets/img/about/".$nombreArchivo_imagen);
	}

	$sql = "INSERT INTO tbl_entradas (ID, fecha, titulo, descripcion, imagen) VALUES (NULL, :fecha, :titulo, :descripcion, :imagen)";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":fecha", $fecha);
	$consulta->bindParam(":titulo", $titulo);
	$consulta->bindParam(":descripcion", $descripcion);
	$consulta->bindParam(":imagen", $nombreArchivo_imagen);
	$consulta->execute();
	$mensaje = "Registro agregado con exito.";
	header("location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
	<div class="card-header">
		Entradas
	</div>
	<div class="card-body">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="mb-3">
				<input class="form-control" type="date" name="fecha" id="fecha" placeholder="Fecha" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="titulo" id="titulo" placeholder="Titulo" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="descripcion" id="descripcion" placeholder="Descripción" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<label class="form-label" style="cursor:pointer;" for="imagen">Imagen:</label>
				<input class="form-control bg-success text-white" type="file" name="imagen" id="imagen" placeholder="Imagen" required />
			</div>

			<button class="btn btn-success btn-sm" type="submit" role="button">Agregar</button>
			<a class="btn btn-primary btn-sm" name="" id="" href="index.php" role="button">Cancelar</a>
		</form>
	</div>
</div>

<?php include("../../templates/footer.php"); ?>
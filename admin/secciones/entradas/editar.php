<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
	$txtID = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
	$sql = "SELECT * FROM tbl_entradas WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();
	$registro = $consulta->fetch(PDO::FETCH_LAZY);
	$fecha = $registro['fecha'];
	$titulo = $registro['titulo'];
	$descripcion = $registro['descripcion'];
	$imagen = $registro['imagen'];
}

if($_POST){
	$txtID = (isset($_POST['txtID']) ? $_POST['txtID'] : "");
	$fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : "");
	$titulo = (isset($_POST['titulo']) ? $_POST['titulo'] : "");
	$descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : "");
	$sql = "UPDATE tbl_entradas SET fecha=:fecha, titulo=:titulo, descripcion=:descripcion WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":fecha", $fecha);
	$consulta->bindParam(":titulo", $titulo);
	$consulta->bindParam(":descripcion", $descripcion);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();

	if($_FILES['imagen']['tmp_name'] != ""){
		$fecha_imagen = new DateTime();
		$imagen = (isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : "");
		$nombreArchivo_imagen = (($imagen != "") ? $fecha_imagen->getTimestamp()."_".$_FILES['imagen']['name'] : "");
		$tmp_imagen = $_FILES['imagen']['tmp_name'];
		move_uploaded_file($tmp_imagen, "../../../assets/img/about/".$nombreArchivo_imagen);
		$sql = "SELECT imagen FROM tbl_entradas WHERE ID=:id";
		$consulta = $conexion->prepare($sql);
		$consulta->bindParam(":id", $txtID);
		$consulta->execute();
		$registro_recuperado = $consulta->fetch(PDO::FETCH_LAZY);
		if(isset($registro_recuperado['imagen']) && $registro_recuperado['imagen'] != ""){
			if(file_exists("../../../assets/img/about/".$registro_recuperado['imagen'])){
					unlink("../../../assets/img/about/".$registro_recuperado['imagen']);
			}
		}
		$sql = "UPDATE tbl_entradas SET imagen=:imagen WHERE ID=:id";
		$consulta = $conexion->prepare($sql);
		$consulta->bindParam(":imagen", $nombreArchivo_imagen);
		$consulta->bindParam(":id", $txtID);
		$consulta->execute();
	}

	$mensaje = "Registro modificado con exito.";
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
				<input class="form-control" readonly type="hidden" name="txtID" id="txtID" value="<?php echo $txtID; ?>" placeholder="ID" autocomplete="off" required >
			</div>

			<div class="mb-3">
				<input class="form-control" type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>" placeholder="Fecha" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $titulo; ?>" placeholder="Titulo" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>" placeholder="Descripción" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<label class="form-label" style="cursor:pointer;" for="imagen">Imagen:</label>
				<br />
				<img class="border border-3 pointer-events-none border-success rounded-circle img-fluid mb-3" width="100" src="../../../assets/img/about/<?php echo $imagen; ?>" alt="<?php echo $titulo; ?>" />
				<input class="form-control bg-success text-white" type="file" name="imagen" id="imagen" placeholder="Imagen" />
			</div>

			<button class="btn btn-success btn-sm" type="submit" role="button">Editar</button>
			<a class="btn btn-primary btn-sm" name="" id="" href="index.php" role="button">Cancelar</a>
		</form>
	</div>
</div>

<?php include("../../templates/footer.php"); ?>
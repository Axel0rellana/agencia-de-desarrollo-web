<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
	$txtID = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
	$sql = "SELECT * FROM tbl_servicios WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();
	$registro = $consulta->fetch(PDO::FETCH_LAZY);
	$icono = $registro['icono'];
	$titulo = $registro['titulo'];
	$descripcion = $registro['descripcion'];
}

if($_POST){
	$txtID = (isset($_POST['txtID']) ? $_POST['txtID'] : "");
	$icono = (isset($_POST['icono']) ? $_POST['icono'] : "");
	$titulo = (isset($_POST['titulo']) ? $_POST['titulo'] : "");
	$descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : "");
	$sql = "UPDATE tbl_servicios SET icono=:icono, titulo=:titulo, descripcion=:descripcion WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":icono", $icono);
	$consulta->bindParam(":titulo", $titulo);
	$consulta->bindParam(":descripcion", $descripcion);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();
	$mensaje = "Registro modificado con exito.";
	header("location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
	<div class="card-header">
		Editando la información de servicios
	</div>
	<div class="card-body">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="mb-3">
				<input class="form-control" readonly type="hidden" name="txtID" id="txtID" value="<?php echo $txtID; ?>" placeholder="ID" autocomplete="off" required >
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="icono" id="icono" placeholder="Icono" value="<?php echo $icono; ?>" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $titulo; ?>" placeholder="Titulo" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>" placeholder="Descripción" autocomplete="off" required />
			</div>

			<button class="btn btn-success btn-sm" type="submit" role="button">Editar</button>
			<a class="btn btn-primary btn-sm" name="" id="" href="index.php" role="button">Cancelar</a>
		</form>
	</div>
</div>

<?php include("../../templates/footer.php"); ?>
<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
	$txtID = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
	$sql = "SELECT * FROM tbl_portafolio WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();
	$registro = $consulta->fetch(PDO::FETCH_LAZY);
	$titulo = $registro['titulo'];
	$subtitulo = $registro['subtitulo'];
	$imagen = $registro['imagen'];
	$descripcion = $registro['descripcion'];
	$cliente = $registro['cliente'];
	$categoria = $registro['categoria'];
	$url = $registro['url'];
}

if($_POST){
	$txtID = (isset($_POST['txtID']) ? $_POST['txtID'] : "");
	$titulo = (isset($_POST['titulo']) ? $_POST['titulo'] : "");
	$subtitulo = (isset($_POST['subtitulo']) ? $_POST['subtitulo'] : "");
	$descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : "");
	$cliente = (isset($_POST['cliente']) ? $_POST['cliente'] : "");
	$categoria = (isset($_POST['categoria']) ? $_POST['categoria'] : "");
	$url = (isset($_POST['url']) ? $_POST['url'] : "");
	$sql = "UPDATE tbl_portafolio SET titulo=:titulo, subtitulo=:subtitulo, descripcion=:descripcion, cliente=:cliente, categoria=:categoria, url=:url WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":titulo", $titulo);
	$consulta->bindParam(":subtitulo", $subtitulo);
	$consulta->bindParam(":descripcion", $descripcion);
	$consulta->bindParam(":cliente", $cliente);
	$consulta->bindParam(":categoria", $categoria);
	$consulta->bindParam(":url", $url);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();

	if($_FILES['imagen']['tmp_name'] != ""){
		$fecha = new DateTime();
		$imagen = (isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : "");
		$nombreArchivo_imagen = (($imagen != "") ? $fecha->getTimestamp()."_".$_FILES['imagen']['name'] : "");
		$tmp_imagen = $_FILES['imagen']['tmp_name'];
		move_uploaded_file($tmp_imagen, "../../../assets/img/portfolio/".$nombreArchivo_imagen);
		$sql = "SELECT imagen FROM tbl_portafolio WHERE ID=:id";
		$consulta = $conexion->prepare($sql);
		$consulta->bindParam(":id", $txtID);
		$consulta->execute();
		$registro_recuperado = $consulta->fetch(PDO::FETCH_LAZY);
		if(isset($registro_recuperado['imagen']) && $registro_recuperado['imagen'] != ""){
			if(file_exists("../../../assets/img/portfolio/".$registro_recuperado['imagen'])){
					unlink("../../../assets/img/portfolio/".$registro_recuperado['imagen']);
			}
		}
		$sql = "UPDATE tbl_portafolio SET imagen=:imagen WHERE ID=:id";
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
		Editando la información del portafolio
	</div>
	<div class="card-body">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="mb-3">
				<input class="form-control" readonly type="hidden" name="txtID" id="txtID" value="<?php echo $txtID; ?>" placeholder="ID" autocomplete="off" required >
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $titulo; ?>" placeholder="Titulo" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="subtitulo" id="subtitulo" value="<?php echo $subtitulo; ?>" placeholder="Subtitulo" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<label class="form-label" style="cursor:pointer;" for="imagen">Imagen:</label>
				<br />
				<img class="border border-3 pointer-events-none border-success rounded-circle img-fluid mb-3" width="100" src="../../../assets/img/portfolio/<?php echo $imagen; ?>" alt="<?php echo $titulo; ?>" />
				<input class="form-control bg-success text-white" type="file" name="imagen" id="imagen" placeholder="Imagen" />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>" placeholder="Descripción" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="cliente" id="cliente" value="<?php echo $cliente; ?>" placeholder="Cliente" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="categoria" id="categoria" value="<?php echo $categoria; ?>" placeholder="Categoria" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="url" id="url" value="<?php echo $url; ?>" placeholder="Url del proyecto" autocomplete="off" required />
			</div>

			<button class="btn btn-success btn-sm" type="submit" role="button">Editar</button>
			<a class="btn btn-primary btn-sm" name="" id="" href="index.php" role="button">Cancelar</a>
		</form>
	</div>
</div>

<?php include("../../templates/footer.php"); ?>
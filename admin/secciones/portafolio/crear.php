<?php
include("../../bd.php");

if($_POST){
	$titulo = (isset($_POST['titulo']) ? $_POST['titulo'] : "");
	$subtitulo = (isset($_POST['subtitulo']) ? $_POST['subtitulo'] : "");
	$imagen = (isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : "");
	$descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : "");
	$cliente = (isset($_POST['cliente']) ? $_POST['cliente'] : "");
	$categoria = (isset($_POST['categoria']) ? $_POST['categoria'] : "");
	$url = (isset($_POST['url']) ? $_POST['url'] : "");
	$fecha = new DateTime();
	$nombreArchivo_imagen = (($imagen != "") ? $fecha->getTimestamp()."_".$_FILES['imagen']['name'] : "");
	$tmp_imagen = $_FILES['imagen']['tmp_name'];
	if($tmp_imagen != ""){
		move_uploaded_file($tmp_imagen, "../../../assets/img/portfolio/".$nombreArchivo_imagen);
	}
	
	$sql = "INSERT INTO tbl_portafolio (ID, titulo, subtitulo, imagen, descripcion, cliente, categoria, url) VALUES (NULL, :titulo, :subtitulo, :imagen, :descripcion, :cliente, :categoria, :url)";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":titulo", $titulo);
	$consulta->bindParam(":subtitulo", $subtitulo);
	$consulta->bindParam(":imagen", $nombreArchivo_imagen);
	$consulta->bindParam(":descripcion", $descripcion);
	$consulta->bindParam(":cliente", $cliente);
	$consulta->bindParam(":categoria", $categoria);
	$consulta->bindParam(":url", $url);
	$consulta->execute();
	$mensaje = "Registro agregado con exito.";
	header("location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
	<div class="card-header">
		Producto del portafolio
	</div>
	<div class="card-body">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="mb-3">
				<input class="form-control" type="text" name="titulo" id="titulo" placeholder="Titulo" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="subtitulo" id="subtitulo" placeholder="Subtitulo" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<label class="form-label" style="cursor:pointer;" for="imagen">Imagen:</label>
				<input class="form-control bg-success text-white" type="file" name="imagen" id="imagen" placeholder="Imagen" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="descripcion" id="descripcion" placeholder="Descripción" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="cliente" id="cliente" placeholder="Cliente" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="categoria" id="categoria" placeholder="Categoria" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="url" id="url" placeholder="Url del proyecto" autocomplete="off" required />
			</div>

			<button class="btn btn-success btn-sm" type="submit" role="button">Agregar</button>
			<a class="btn btn-primary btn-sm" name="" id="" href="index.php" role="button">Cancelar</a>
		</form>
	</div>
</div>

<?php include("../../templates/footer.php"); ?>
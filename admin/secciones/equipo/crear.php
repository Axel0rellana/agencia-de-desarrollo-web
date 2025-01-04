<?php
include("../../bd.php");

if($_POST){
	$imagen = (isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : "");
	$nombrecompleto = (isset($_POST['nombrecompleto']) ? $_POST['nombrecompleto'] : "");
	$puesto = (isset($_POST['puesto']) ? $_POST['puesto'] : "");
	$twitter = (isset($_POST['twitter']) ? $_POST['twitter'] : "");
	$facebook = (isset($_POST['facebook']) ? $_POST['facebook'] : "");
	$linkedin = (isset($_POST['linkedin']) ? $_POST['linkedin'] : "");
	$fecha_imagen = new DateTime();
	$nombreArchivo_imagen = (($imagen != "") ? $fecha_imagen->getTimestamp()."_".$_FILES['imagen']['name'] : "");
	$tmp_imagen = $_FILES['imagen']['tmp_name'];
	if($tmp_imagen != ""){
		move_uploaded_file($tmp_imagen, "../../../assets/img/team/".$nombreArchivo_imagen);
	}
	$sql = "INSERT INTO tbl_equipo (ID, imagen, nombrecompleto, puesto, twitter, facebook, linkedin) VALUES (NULL, :imagen, :nombrecompleto, :puesto, :twitter, :facebook, :linkedin)";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":imagen", $nombreArchivo_imagen);
	$consulta->bindParam(":nombrecompleto", $nombrecompleto);
	$consulta->bindParam(":puesto", $puesto);
	$consulta->bindParam(":twitter", $twitter);
	$consulta->bindParam(":facebook", $facebook);
	$consulta->bindParam(":linkedin", $linkedin);
	$consulta->execute();
	$mensaje = "Registro agregado con exito.";
	header("location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
	<div class="card-header">
		Datos de la persona
	</div>
	<div class="card-body">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="mb-3">
				<label class="form-label" style="cursor:pointer;" for="imagen">Imagen:</label>
				<input class="form-control bg-success text-white" type="file" name="imagen" id="imagen" placeholder="Imagen" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="nombrecompleto" id="nombrecompleto" placeholder="Nombre completo" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="puesto" id="puesto" placeholder="Puesto" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="twitter" id="twitter" placeholder="Twitter" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="facebook" id="facebook" placeholder="Facebook" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="linkedin" id="linkedin" placeholder="LinkedIn" autocomplete="off" required />
			</div>

			<button class="btn btn-success btn-sm" type="submit" role="button">Agregar</button>
			<a class="btn btn-primary btn-sm" name="" id="" href="index.php" role="button">Cancelar</a>
		</form>
	</div>
</div>

<?php include("../../templates/footer.php"); ?>
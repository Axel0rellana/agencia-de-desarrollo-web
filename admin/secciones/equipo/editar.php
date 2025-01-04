<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
	$txtID = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
	$sql = "SELECT * FROM tbl_equipo WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();
	$registro = $consulta->fetch(PDO::FETCH_LAZY);
	$imagen = $registro['imagen'];
	$nombrecompleto = $registro['nombrecompleto'];
	$puesto = $registro['puesto'];
	$twitter = $registro['twitter'];
	$facebook = $registro['facebook'];
	$linkedin = $registro['linkedin'];
}

if($_POST){
	$txtID = (isset($_POST['txtID']) ? $_POST['txtID'] : "");
	$nombrecompleto = (isset($_POST['nombrecompleto']) ? $_POST['nombrecompleto'] : "");
	$puesto = (isset($_POST['puesto']) ? $_POST['puesto'] : "");
	$twitter = (isset($_POST['twitter']) ? $_POST['twitter'] : "");
	$facebook = (isset($_POST['facebook']) ? $_POST['facebook'] : "");
	$linkedin = (isset($_POST['linkedin']) ? $_POST['linkedin'] : "");
	$sql = "UPDATE tbl_equipo SET nombrecompleto=:nombrecompleto, puesto=:puesto, twitter=:twitter, facebook=:facebook, linkedin=:linkedin WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":nombrecompleto", $nombrecompleto);
	$consulta->bindParam(":puesto", $puesto);
	$consulta->bindParam(":twitter", $twitter);
	$consulta->bindParam(":facebook", $facebook);
	$consulta->bindParam(":linkedin", $linkedin);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();

	if($_FILES['imagen']['tmp_name'] != ""){
		$fecha_imagen = new DateTime();
		$imagen = (isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : "");
		$nombreArchivo_imagen = (($imagen != "") ? $fecha_imagen->getTimestamp()."_".$_FILES['imagen']['name'] : "");
		$tmp_imagen = $_FILES['imagen']['tmp_name'];
		move_uploaded_file($tmp_imagen, "../../../assets/img/team/".$nombreArchivo_imagen);
		$sql = "SELECT imagen FROM tbl_equipo WHERE ID=:id";
		$consulta = $conexion->prepare($sql);
		$consulta->bindParam(":id", $txtID);
		$consulta->execute();
		$registro_recuperado = $consulta->fetch(PDO::FETCH_LAZY);
		if(isset($registro_recuperado['imagen']) && $registro_recuperado['imagen'] != ""){
			if(file_exists("../../../assets/img/team/".$registro_recuperado['imagen'])){
					unlink("../../../assets/img/team/".$registro_recuperado['imagen']);
			}
		}
		$sql = "UPDATE tbl_equipo SET imagen=:imagen WHERE ID=:id";
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
		Editar datos de la persona
	</div>
	<div class="card-body">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="mb-3">
				<input class="form-control" readonly type="hidden" name="txtID" id="txtID" value="<?php echo $txtID; ?>" placeholder="ID" autocomplete="off" required >
			</div>

			<div class="mb-3">
				<label class="form-label" style="cursor:pointer;" for="imagen">Imagen:</label>
				<br />
				<img class="border border-3 pointer-events-none border-success rounded-circle img-fluid mb-3" width="100" src="../../../assets/img/team/<?php echo $imagen; ?>" alt="<?php echo $nombrecompleto; ?>" />
				<input class="form-control bg-success text-white" type="file" name="imagen" id="imagen" placeholder="Imagen" />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="nombrecompleto" id="nombrecompleto" value="<?php echo $nombrecompleto; ?>" placeholder="Nombre completo" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="puesto" id="puesto" value="<?php echo $puesto; ?>" placeholder="Puesto" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="twitter" id="twitter" value="<?php echo $twitter; ?>" placeholder="Twitter" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="facebook" id="facebook" value="<?php echo $facebook; ?>" placeholder="Facebook" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="linkedin" id="linkedin" value="<?php echo $linkedin; ?>" placeholder="LinkedIn" autocomplete="off" required />
			</div>

			<button class="btn btn-success btn-sm" type="submit" role="button">Editar</button>
			<a class="btn btn-primary btn-sm" name="" id="" href="index.php" role="button">Cancelar</a>
		</form>
	</div>
</div>

<?php include("../../templates/footer.php"); ?>
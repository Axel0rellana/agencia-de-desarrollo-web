<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
	$txtID = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
	$sql = "SELECT * FROM tbl_configuraciones WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();
	$registro = $consulta->fetch(PDO::FETCH_LAZY);
	$nombreconfiguracion = $registro['nombreconfiguracion'];
	$valor = $registro['valor'];
}

if($_POST){
	$txtID = (isset($_POST['txtID']) ? $_POST['txtID'] : "");
	$nombreconfiguracion = (isset($_POST['nombreconfiguracion']) ? $_POST['nombreconfiguracion'] : "");
	$valor = (isset($_POST['valor']) ? $_POST['valor'] : "");
	$sql = "UPDATE tbl_configuraciones SET nombreconfiguracion=:nombreconfiguracion, valor=:valor WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":nombreconfiguracion", $nombreconfiguracion);
	$consulta->bindParam(":valor", $valor);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();
	$mensaje = "Registro modificado con exito.";
	header("location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
	<div class="card-header">
		Configuración
	</div>
	<div class="card-body">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="mb-3">
				<input class="form-control" readonly type="hidden" name="txtID" id="txtID" value="<?php echo $txtID; ?>" placeholder="ID" autocomplete="off" required >
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="nombreconfiguracion" id="nombreconfiguracion" value="<?php echo $nombreconfiguracion; ?>" placeholder="Nombre de la configuración" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="valor" id="valor" value="<?php echo $valor; ?>" placeholder="Valor" autocomplete="off" required />
			</div>

			<button class="btn btn-success btn-sm" type="submit" role="button">Editar</button>
			<a class="btn btn-primary btn-sm" name="" id="" href="index.php" role="button">Cancelar</a>
		</form>
	</div>
</div>

<?php include("../../templates/footer.php"); ?>
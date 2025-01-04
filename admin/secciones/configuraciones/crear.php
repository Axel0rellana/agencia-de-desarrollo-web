<?php
include("../../bd.php");

if($_POST){
	$nombreconfiguracion = (isset($_POST['nombreconfiguracion']) ? $_POST['nombreconfiguracion'] : "");
	$valor = (isset($_POST['valor']) ? $_POST['valor'] : "");
	$sql = "INSERT INTO tbl_configuraciones (ID, nombreconfiguracion, valor) VALUES (NULL, :nombreconfiguracion, :valor)";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":nombreconfiguracion", $nombreconfiguracion);
	$consulta->bindParam(":valor", $valor);
	$consulta->execute();
	$mensaje = "Registro agregado con exito.";
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
				<input class="form-control" type="text" name="nombreconfiguracion" id="nombreconfiguracion" placeholder="Nombre de la configuración" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="text" name="valor" id="valor" placeholder="Valor" autocomplete="off" required />
			</div>

			<button class="btn btn-success btn-sm" type="submit" role="button">Agregar</button>
			<a class="btn btn-primary btn-sm" name="" id="" href="index.php" role="button">Cancelar</a>
		</form>
	</div>
</div>

<?php include("../../templates/footer.php"); ?>
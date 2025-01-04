<?php
include("../../bd.php");

if($_POST){
	$usuario = (isset($_POST['usuario']) ? $_POST['usuario'] : "");
	$password = (isset($_POST['password']) ? $_POST['password'] : "");
	$correo = (isset($_POST['correo']) ? $_POST['correo'] : "");
	$sql = "INSERT INTO tbl_usuarios (ID, usuario, password, correo) VALUES (NULL, :usuario, :password, :correo)";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":usuario", $usuario);
	$consulta->bindParam(":password", $password);
	$consulta->bindParam(":correo", $correo);
	$consulta->execute();
	$mensaje = "Registro agregado con exito.";
	header("location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
	<div class="card-header">
		Datos del usuario
	</div>
	<div class="card-body">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="mb-3">
				<input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="password" name="password" id="password" placeholder="Contraseña" autocomplete="off" required />
			</div>

			<div class="mb-3">
				<input class="form-control" type="email" name="correo" id="correo" placeholder="Correo" autocomplete="off" required />
			</div>

			<button class="btn btn-success btn-sm" type="submit" role="button">Agregar</button>
			<a class="btn btn-primary btn-sm" name="" id="" href="index.php" role="button">Cancelar</a>
		</form>
	</div>
</div>

<?php include("../../templates/footer.php"); ?>
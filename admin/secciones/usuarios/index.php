<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
	$txtID = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
	$sql = "DELETE FROM tbl_usuarios WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();
	$mensaje = "Registro eliminado con exito.";
	header("location:index.php?mensaje=".$mensaje);
}

$sql = "SELECT * FROM tbl_usuarios";
$consulta = $conexion->prepare($sql);
$consulta->execute();
$lista_usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
	<div class="card-header">
		<a class="btn btn-primary" name="" id="" href="crear.php" role="button">Agregar registros</a>
	</div>
	<div class="card-body">
		<div class="table-responsive-sm">
			<table class="table" id="tabla_id">
				<thead>
					<tr>
						<th>ID</th>
						<th>Usuario</th>
						<th>Password</th>
						<th>Correo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($lista_usuarios as $registro) { ?>
						<tr>
							<td><?php echo $registro['ID']; ?></td>
							<td><?php echo $registro['usuario']; ?></td>
							<td>*****</td>
							<td><?php echo $registro['correo']; ?></td>
							<td>
								<a class="btn btn-warning btn-sm" href="editar.php?txtID=<?php echo $registro['ID']; ?>" name="editar" id="editar" role="button">Editar</a>
								<a class="btn btn-danger btn-sm" href="javascript:borrar(<?php echo $registro['ID']; ?>)" name="borrar" id="borrar" role="button">Borrar</a>
							</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include("../../templates/footer.php"); ?>
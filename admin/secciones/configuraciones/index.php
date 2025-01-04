<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
	$txtID = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
	$sql = "DELETE FROM tbl_configuraciones WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();
	$mensaje = "Registro eliminado con exito.";
	header("location:index.php?mensaje=".$mensaje);
}

$sql = "SELECT * FROM tbl_configuraciones";
$consulta = $conexion->prepare($sql);
$consulta->execute();
$lista_configuraciones = $consulta->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
	<div class="card-header">Configuración</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table" id="tabla_id">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre de la configuración</th>
						<th>Valor</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($lista_configuraciones as $registro) { ?>
						<tr>
							<td><?php echo $registro['ID']; ?></td>
							<td><?php echo $registro['nombreconfiguracion']; ?></td>
							<td><?php echo $registro['valor']; ?></td>
							<td>
								<a class="btn btn-warning btn-sm" href="editar.php?txtID=<?php echo $registro['ID']; ?>" name="editar" id="editar" role="button">Editar</a>
							</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include("../../templates/footer.php"); ?>
<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
	$txtID = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
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
	$sql = "DELETE FROM tbl_equipo WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();
	$mensaje = "Registro eliminado con exito.";
	header("location:index.php?mensaje=".$mensaje);
}

$sql = "SELECT * FROM tbl_equipo";
$consulta = $conexion->prepare($sql);
$consulta->execute();
$lista_equipo = $consulta->fetchAll(PDO::FETCH_ASSOC); 

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
						<th>Imagen</th>
						<th>Nombre</th>
						<th>Puesto</th>
						<th>Redes sociales</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($lista_equipo as $registro){ ?>
						<tr>
							<td><?php echo $registro['ID']; ?></td>
							<td>
								<img class="border border-3 pointer-events-none border-success img-fluid" width="50" src="../../../assets/img/team/<?php echo $registro['imagen']; ?>" alt="<?php echo $registro['nombrecompleto']; ?>" />
							</td>
							<td><?php echo $registro['nombrecompleto']; ?></td>
							<td><?php echo $registro['puesto']; ?></td>
							<td>
								<a class="btn btn-dark btn-social mx-2" href="<?php echo $registro['facebook']; ?>" aria-label="Parveen Anand Facebook Profile" rel="noopener" target="_blank"><i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-dark btn-social mx-2" href="<?php echo $registro['twitter']; ?>" aria-label="Parveen Anand Twitter Profile" rel="noopener" target="_blank"><i class="fab fa-twitter"></i></a>
								<a class="btn btn-dark btn-social mx-2" href="<?php echo $registro['linkedin']; ?>" aria-label="Parveen Anand LinkedIn Profile" rel="noopener" target="_blank"><i class="fab fa-linkedin-in"></i></a>
							</td>
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
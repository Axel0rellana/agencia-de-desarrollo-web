<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
	$txtID = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
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
	$sql = "DELETE FROM tbl_portafolio WHERE ID=:id";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":id", $txtID);
	$consulta->execute();
	$mensaje = "Registro eliminado con exito.";
	header("location:index.php?mensaje=".$mensaje);
}

$sql = "SELECT * FROM tbl_portafolio";
$consulta = $conexion->prepare($sql);
$consulta->execute();
$lista_portafolio = $consulta->fetchAll(PDO::FETCH_ASSOC);

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
						<th>Sitio</th>
						<th>Imagen</th>
						<th>Descripción</th>
						<th>Cliente y categoria</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($lista_portafolio as $registro) { ?>
						<tr>
							<td><?php echo $registro['ID']; ?></td>
							<td>
								- <?php echo $registro['titulo']; ?><br/>
								- <?php echo $registro['subtitulo']; ?>
								<a
									class="link-success link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
									href="<?php echo $registro['url']; ?>"
									rel="noopener"
									target="_blank"
								>
									<?php echo $registro['url']; ?>
								</a>
							</td>
							<td>
								<img class="border border-3 pointer-events-none border-success img-fluid" width="50" src="../../../assets/img/portfolio/<?php echo $registro['imagen']; ?>" alt="<?php echo $registro['titulo']; ?>" />
							</td>
							<td><?php echo $registro['descripcion']; ?></td>
							<td>
								- <?php echo $registro['cliente']; ?><br/>
								- <?php echo $registro['categoria']; ?>
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
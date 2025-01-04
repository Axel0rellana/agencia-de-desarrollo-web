<?php
session_start();
$url_base = "http://localhost/webs/php/proyectos/agencia-de-desarrollo-web/";
$url_admin = "http://localhost/webs/php/proyectos/agencia-de-desarrollo-web/admin/";

if($_POST){
	include("./bd.php");
	$usuario = (isset($_POST['usuario']) ? $_POST['usuario'] : "");
	$password = (isset($_POST['password']) ? $_POST['password'] : "");
	$sql = "SELECT *, count(*) as n_usuario FROM tbl_usuarios WHERE usuario=:usuario AND password=:password";
	$consulta = $conexion->prepare($sql);
	$consulta->bindParam(":usuario", $usuario);
	$consulta->bindParam(":password", $password);
	$consulta->execute();
	$lista_usuarios = $consulta->fetch(PDO::FETCH_LAZY);

	if($lista_usuarios['n_usuario']>0){
		$_SESSION['usuario'] = $lista_usuarios['usuario'];
		$_SESSION['logueado'] = true;
		header("location:index.php");
	}else{
		$mensaje = "Error: El usuario o la contraseña son incorrectos";
	}
}

?>
<!DOCTYPE html>
<html lang="es">
	 <head>
		  <meta charset="UTF-8" />
		  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		  <meta name="theme-color" content="#ffffff" />
		  <meta name="description" content="Login" />
		  <meta name="author" content="Axe10rellana" />
		  <link rel="icon" type="image/x-icon" href="<?php echo $url_base; ?>assets/icons/favicon.ico" />
		  <link rel="favicon" type="image/x-icon" href="<?php echo $url_base; ?>assets/icons/favicon.png" />
    	<link rel="apple-touch-icon" type="image/x-icon" href="<?php echo $url_base; ?>assets/icons/apple-touch-icon.png" />
		  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
		  <link href="<?php echo $url_admin; ?>css/styles.css" type="text/css" rel="stylesheet" />
		  <script type="text/javascript" src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
		  <title>Login</title>
	 </head>
	 <body class="select-none">

	 	<header></header>
	 	<main>
	 		<div class="container mt-4">
	 			<div class="row">
	 				<div class="col-md-4"></div>

	 				<div class="col-md-4">
	 					<?php if(isset($mensaje)){ ?>
		 					<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
								<strong><?php echo $mensaje; ?></strong>	 								
		 					</div>
	 					<?php }?>

	 					<div class="card">
	 						<div class="card-header">
		 						Iniciar sesión
	 						</div>
	 						<div class="card-body">
	 							<form action="" method="post">
	 								<div class="mb-3">
	 									<input class="form-control" type="text" name="usuario" id="usuario" placeholder="Nombre de usuario" autocomplete="off" required />
	 								</div>

	 								<div class="mb-3">
	 									<input class="form-control" type="password" name="password" id="password" placeholder="Contraseña" autocomplete="off" required />
	 								</div>

	 								<input class="btn btn-primary btn-sm" type="submit" value="Iniciar sesión" />
	 							</form>
	 						</div>
	 					</div>
	 				</div>

	 				<div class="col-md-4"></div>
	 			</div>
	 		</div>
	 	</main>
	 	<footer></footer>
		
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
	</body>
</html>

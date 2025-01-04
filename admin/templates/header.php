<?php
session_start();
$url_base = "http://localhost/webs/php/proyectos/agencia-de-desarrollo-web/";
$url_admin = "http://localhost/webs/php/proyectos/agencia-de-desarrollo-web/admin/";

if(!isset($_SESSION['usuario'])){
	header("location:".$url_admin."login.php");
}

?>
<!DOCTYPE html>
<html lang="es">
	 <head>
		  <meta charset="UTF-8" />
		  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		  <meta name="theme-color" content="#ffffff" />
		  <meta name="description" content="Panel de administración" />
		  <meta name="author" content="Axe10rellana" />
		  <link rel="icon" type="image/x-icon" href="<?php echo $url_base; ?>assets/icons/favicon.ico" />
		  <link rel="favicon" type="image/x-icon" href="<?php echo $url_base; ?>assets/icons/favicon.png" />
    	<link rel="apple-touch-icon" type="image/x-icon" href="<?php echo $url_base; ?>assets/icons/apple-touch-icon.png" />
		  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
		  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
		  <link href="<?php echo $url_admin; ?>css/styles.css" type="text/css" rel="stylesheet" />
		  <script type="text/javascript" src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
		  <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		  <title>Panel de administración</title>
	 </head>
	 <body class="select-none">

	 		<header>
	 			 <nav class="navbar navbar-expand-lg bg-primary navbar-dark mb-4">
		      <div class="container-fluid">
		        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		          <span class="navbar-toggler-icon"></span>
		        </button>
		        <div class="collapse navbar-collapse" id="navbarNav">
		          <ul class="navbar-nav">
		            <li class="nav-item">
		              <a class="nav-link" href="<?php echo $url_admin; ?>">Administrador</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" href="<?php echo $url_admin; ?>secciones/servicios/">Servicios</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" href="<?php echo $url_admin; ?>secciones/portafolio/">Portafolio</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" href="<?php echo $url_admin; ?>secciones/entradas/">Entradas</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" href="<?php echo $url_admin; ?>secciones/equipo/">Equipo</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" href="<?php echo $url_admin; ?>secciones/configuraciones/">Configuraciones</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" href="<?php echo $url_admin; ?>secciones/usuarios/">Usuarios</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" href="<?php echo $url_admin; ?>cerrar.php">Cerrar sesión</a>
		            </li>
		          </ul>
		        </div>
		      </div>
    		</nav>
	 		</header>
	 		<main class="container">
	 		<?php if(isset($_GET['mensaje'])){ ?>
      <script type="text/javascript">
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "<?php echo $_GET['mensaje']; ?>",
          timer: 2000,
          confirmButtonColor: "#2ecc71",
        });
      </script>
    <?php }?>
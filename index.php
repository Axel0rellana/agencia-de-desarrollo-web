<?php
include("admin/bd.php");

$servicios = "SELECT * FROM tbl_servicios";
$consulta = $conexion->prepare($servicios);
$consulta->execute();
$lista_servicios = $consulta->fetchAll(PDO::FETCH_ASSOC);

$portfolio = "SELECT * FROM tbl_portafolio";
$consulta = $conexion->prepare($portfolio);
$consulta->execute();
$lista_portafolio = $consulta->fetchAll(PDO::FETCH_ASSOC);

$entradas = "SELECT * FROM tbl_entradas";
$consulta = $conexion->prepare($entradas);
$consulta->execute();
$lista_entradas = $consulta->fetchAll(PDO::FETCH_ASSOC);

$equipo = "SELECT * FROM tbl_equipo";
$consulta = $conexion->prepare($equipo);
$consulta->execute();
$lista_equipo = $consulta->fetchAll(PDO::FETCH_ASSOC);

$configuraciones = "SELECT * FROM tbl_configuraciones";
$consulta = $conexion->prepare($configuraciones);
$consulta->execute();
$lista_configuraciones = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">
	 <head>
		  <meta charset="UTF-8" />
		  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		  <meta name="theme-color" content="#ffffff" />
		  <meta name="description" content="Agencia de desarrollo web" />
		  <meta name="author" content="Axe10rellana" />
		  <link rel="icon" type="image/x-icon" href="assets/icons/favicon.ico" />
		  <link rel="favicon" type="image/x-icon" href="assets/icons/favicon.png" />
    	<link rel="apple-touch-icon" type="image/x-icon" href="assets/icons/apple-touch-icon.png" />
		  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
		  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
		  <link href="css/styles.css" type="text/css" rel="stylesheet" />
		  <script type="text/javascript" src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
		  <title>Agencia de desarrollo web</title>
	 </head>
	 <body class="" id="page-top">
		  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
				<div class="container">
					 <a class="navbar-brand" href="#page-top"><img class="pointer-events-none" src="assets/img/logo.png" alt="logo" /></a>
					 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
						  Menu
						  <i class="fas fa-bars ms-1"></i>
					 </button>
					 <div class="collapse navbar-collapse" id="navbarResponsive">
						  <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
								<li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>
								<li class="nav-item"><a class="nav-link" href="#portfolio">Portafolio</a></li>
								<li class="nav-item"><a class="nav-link" href="#about">Nosotros</a></li>
								<li class="nav-item"><a class="nav-link" href="#team">Equipo</a></li>
								<li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
						  </ul>
					 </div>
				</div>
		  </nav>
		  
		  <header class="masthead">
				<div class="container">
					 <div class="masthead-subheading"><?php echo $lista_configuraciones[0]['valor']; ?></div>
					 <div class="masthead-heading text-uppercase"><?php echo $lista_configuraciones[1]['valor']; ?></div>
					 <a class="btn btn-primary btn-xl text-uppercase" href="<?php echo $lista_configuraciones[3]['valor']; ?>"><?php echo $lista_configuraciones[2]['valor']; ?></a>
				</div>
		  </header>
		  
		  <section class="page-section" id="services">
				<div class="container">
					 <div class="text-center">
						  <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[4]['valor']; ?></h2>
						  <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[5]['valor']; ?></h3>
					 </div>
					 <div class="row text-center">
						  <?php foreach($lista_servicios as $registro){ ?>
							  <div class="col-md-4">
									<span class="fa-stack fa-4x">
										 <i class="fas fa-circle fa-stack-2x text-primary"></i>
										 <i class="<?php echo $registro['icono']; ?> fa-stack-1x fa-inverse"></i>
									</span>
									<h4 class="my-3"><?php echo $registro['titulo']; ?></h4>
									<p class="text-muted"><?php echo $registro['descripcion']; ?></p>
							  </div>
							<?php }?>
					 </div>
				</div>
		  </section>
		  
		  <section class="page-section bg-light" id="portfolio">
				<div class="container">
					 <div class="text-center">
						  <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[6]['valor']; ?></h2>
						  <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[7]['valor']; ?></h3>
					 </div>
					 <div class="row">
					 		<?php foreach ($lista_portafolio as $registro) { ?>
							  <div class="col-lg-4 col-sm-6 mb-4">
									<div class="portfolio-item">
										 <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $registro['ID']; ?>">
											  <div class="portfolio-hover">
													<div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
											  </div>
											  <img class="img-fluid pointer-events-none" src="assets/img/portfolio/<?php echo $registro['imagen']; ?>" alt="<?php echo $registro['titulo']; ?>" />
										 </a>
										 <div class="portfolio-caption">
											  <div class="portfolio-caption-heading"><?php echo $registro['cliente']; ?></div>
											  <div class="portfolio-caption-subheading text-muted"><?php echo $registro['categoria']; ?></div>
										 </div>
									</div>
							  </div>
							  <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $registro['ID']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										 <div class="modal-content">
											  <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
											  <div class="container">
													<div class="row justify-content-center">
														 <div class="col-lg-8">
															  <div class="modal-body">
																	<h2 class="text-uppercase"><?php echo $registro['titulo']; ?></h2>
																	<p class="item-intro text-muted"><?php echo $registro['subtitulo']; ?></p>
																	<img class="img-fluid d-block mx-auto pointer-events-none" src="assets/img/portfolio/<?php echo $registro['imagen']; ?>" alt="<?php echo $registro['titulo']; ?>" />
																	<p><?php echo $registro['descripcion']; ?></p>
																	<ul class="list-inline">
																		 <li>
																			  <strong>Cliente:</strong>
																			  <?php echo $registro['cliente']; ?>
																		 </li>
																		 <li>
																			  <strong>Categoría:</strong>
																			  <?php echo $registro['categoria']; ?>
																		 </li>
																		 <li>
																			  <strong>URL:</strong>
																			  <a
																					class="link-success link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
																					href="<?php echo $registro['url']; ?>"
																					rel="noopener"
																					target="_blank"
																				>
																					<?php echo $registro['url']; ?>
																				</a>
																		 </li>
																	</ul>
																	<button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
																		 <i class="fas fa-xmark me-1"></i>
																		 Cerrar
																	</button>
															  </div>
														 </div>
													</div>
											  </div>
										 </div>
									</div>
			  				</div>
						  <?php }?>
					 </div>
				</div>
		  </section>
		  
		  <section class="page-section" id="about">
				<div class="container">
					 <div class="text-center">
						  <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[8]['valor']; ?></h2>
						  <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[9]['valor']; ?></h3>
					 </div>
					 <ul class="timeline">
					 		<?php
					 			$contador = 1;
					 			foreach ($lista_entradas as $registro){
					 		?>
							  <li class="<?php echo ($contador % 2 == 0) ? "timeline-inverted" : ""; ?>">
									<div class="timeline-image"><img class="rounded-circle img-fluid pointer-events-none" src="assets/img/about/<?php echo $registro['imagen']; ?>" alt="<?php echo $registro['titulo']; ?>" /></div>
									<div class="timeline-panel">
										 <div class="timeline-heading">
											  <h4><?php echo $registro['fecha']; ?></h4>
											  <h4 class="subheading"><?php echo $registro['titulo']; ?></h4>
										 </div>
										 <div class="timeline-body"><p class="text-muted"><?php echo $registro['descripcion']; ?></p></div>
									</div>
							  </li>
						 	<?php
						 		$contador++;
						 	}?>
						  <li class="timeline-inverted">
								<div class="timeline-image">
									 <h4><br />
										  <?php echo $lista_configuraciones[10]['valor']; ?>
									 </h4>
								</div>
						  </li>
					 </ul>
				</div>
		  </section>
		  
		  <section class="page-section bg-light" id="team">
				<div class="container">
					 <div class="text-center">
						  <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[11]['valor']; ?></h2>
						  <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[12]['valor']; ?></h3>
					 </div>
					 <div class="row">
					 		<?php foreach ($lista_equipo as $registro){ ?>
							  <div class="col-lg-4">
									<div class="team-member">
										 <img class="mx-auto rounded-circle pointer-events-none" src="assets/img/team/<?php echo $registro['imagen']; ?>" alt="<?php echo $registro['nombrecompleto']; ?>" />
										 <h4><?php echo $registro['nombrecompleto']; ?></h4>
										 <p class="text-muted"><?php echo $registro['puesto']; ?></p>
										 <a class="btn btn-dark btn-social mx-2" href="<?php echo $registro['twitter']; ?>" aria-label="Parveen Anand Twitter Profile" rel="noopener" target="_blank"><i class="fab fa-twitter"></i></a>
										 <a class="btn btn-dark btn-social mx-2" href="<?php echo $registro['facebook']; ?>" aria-label="Parveen Anand Facebook Profile" rel="noopener" target="_blank"><i class="fab fa-facebook-f"></i></a>
										 <a class="btn btn-dark btn-social mx-2" href="<?php echo $registro['linkedin']; ?>" aria-label="Parveen Anand LinkedIn Profile" rel="noopener" target="_blank"><i class="fab fa-linkedin-in"></i></a>
									</div>
							  </div>
							<?php }?>
					 </div>
				</div>
		  </section>
		 
		  <section class="page-section" id="contact">
				<div class="container">
					 <div class="text-center">
						  <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[13]['valor']; ?></h2>
						  <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[14]['valor']; ?></h3>
					 </div>
					
					 <form id="contactForm" data-sb-form-api-token="API_TOKEN">
						  <div class="row align-items-stretch mb-5">
								<div class="col-md-6">
									 <div class="form-group">
										  
										  <input class="form-control" id="name" type="text" placeholder="Nombre *" data-sb-validations="required" />
										  <div class="invalid-feedback" data-sb-feedback="name:required">El nombre es requerido.</div>
									 </div>
									 <div class="form-group">
										  
										  <input class="form-control" id="email" type="email" placeholder="Correo *" data-sb-validations="required,email" />
										  <div class="invalid-feedback" data-sb-feedback="email:required">El correo es requerido.</div>
										  <div class="invalid-feedback" data-sb-feedback="email:email">El correo no es valido.</div>
									 </div>
									 <div class="form-group mb-md-0">
										  
										  <input class="form-control" id="phone" type="tel" placeholder="Número de telefono *" data-sb-validations="required" />
										  <div class="invalid-feedback" data-sb-feedback="phone:required">El número de telefono es requerido.</div>
									 </div>
								</div>
								<div class="col-md-6">
									 <div class="form-group form-group-textarea mb-md-0">
										  
										  <textarea class="form-control no-resize" id="message" placeholder="Mensaje *" data-sb-validations="required"></textarea>
										  <div class="invalid-feedback" data-sb-feedback="message:required">El mensaje es requerido.</div>
									 </div>
								</div>
						  </div>
						 
						  <div class="d-none" id="submitSuccessMessage">
								<div class="text-center text-white mb-3">
									 <div class="fw-bolder">Formulario enviado correctamente</div>
									 To activate this form, sign up at
									 <br />
									 <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
								</div>
						  </div>
						  
						  <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error al enviar el mensaje</div></div>
						 
						  <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Enviar Mensaje</button></div>
					 </form>
				</div>
		  </section>
		  
		  <footer class="footer py-4">
				<div class="container">
					 <div class="row align-items-center">
						  <div class="col-lg-4 text-lg-start">Copyright &copy; Agencia de desarrollo web <?php echo date('Y'); ?></div>
						  <div class="col-lg-4 my-3 my-lg-0">
								<a class="btn btn-dark btn-social mx-2" href="<?php echo $lista_configuraciones[15]['valor']; ?>" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
								<a class="btn btn-dark btn-social mx-2" href="<?php echo $lista_configuraciones[16]['valor']; ?>" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-dark btn-social mx-2" href="<?php echo $lista_configuraciones[17]['valor']; ?>" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
						  </div>
					 </div>
				</div>
		  </footer>
		 
		 
		  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
		  <script type="text/javascript" src="js/app.js"></script>
		  <script type="text/javascript" src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
	 </body>
</html>

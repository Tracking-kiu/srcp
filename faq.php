<?php
     require("config.php"); // requerimos nuestra configuracion
if (isset($_COOKIE["id_usuario"]) && isset($_COOKIE["marca_aleatoria_usuario"])){
   //Tengo cookies memorizadas
   //además voy a comprobar que esas variables no estén vacías
   if ($_COOKIE["id_usuario"]!="" || $_COOKIE["marca_aleatoria_usuario"]!=""){
// 
$query = "  SELECT 
                nombre
            FROM usuarios 
            WHERE 
                ID = :id 
        "; 
        $query_params = array( 
            ':id' => $_COOKIE['id_usuario'] 
        ); 
         
        try{ 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ 
		echo "<div class='panel-body'>
                            <div class='alert alert-warning alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Tenemos problemas al ejecutar la consulta :c El error es el siguiente: 
								</div>" .$ex->getMessage();
		} 
        $row = $stmt->fetch();
   }
}else{
	header('Location: login.php?accion=log_error');
	}
 ?>
<!DOCTYPE html>
<hçtml lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>FAQ - Ace Admin</title>

		<meta name="description" content="frequently asked questions using tabs and accordions" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>


	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Sistema de control y registro de profesores.
						</small>
					</a>
				</div>
				<!--menu-->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Foto de <?php echo $row['nombre']?>" />
								<span class="user-info">
								Bienvenido, <?php echo $row['nombre']?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Configuracion
									</a>
								</li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-user"></i>
										Perfil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="salir.php">
										<i class="ace-icon fa fa-power-off"></i>
										Cerrar sesion
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<ul class="nav nav-list">
					<li class="active">
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Panel de control</span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa  fa-mortar-board"></i>
							<span class="menu-text">
								Profesores
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="registro_profesor.php">
									<i class="menu-icon fa fa-caret-right"></i>

									Registrar profesor
								</a>
								</li>

							<li class="">
								<a href="listar_profesor.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Listar profesores
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="editar_profesor">
									<i class="menu-icon fa fa-caret-right"></i>
									Editar profesor
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
				</ul>
				<ul class="nav nav-list">
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Secciones </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="registro_seccion.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Registrar secciones
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="editar_seccion.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Editar secciones
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				<ul class="nav nav-list">
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa  fa-calendar"></i>
							<span class="menu-text"> Horarios </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="registrar_horario.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Programar horarios
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="editar_horario.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Editar horarios
								</a>

								<b class="arrow"></b>
							</li>
						</ul><!-- /.nav-list -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">Inicio</a>
							</li>
							<li class="active">Preguntas frecuentes</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Buscar..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>
						<div class="page-header">
							<h1>
								Principal
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Preguntas frecuentes.
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="tabbable">
									<ul class="nav nav-tabs padding-18 tab-size-bigger" id="myTab">
										<li class="active">
											<a data-toggle="tab" href="#faq-tab-1">
												<i class="blue ace-icon fa fa-question-circle bigger-120"></i>
												Sistema
											</a>
										</li>

										<li>
											<a data-toggle="tab" href="#faq-tab-2">
												<i class="green ace-icon fa fa-user bigger-120"></i>
												Cuentas
											</a>
										</li>

										<li>
											<a data-toggle="tab" href="#faq-tab-3">
												<i class="orange ace-icon fa fa-credit-card bigger-120"></i>
												¿Como hago ...?
											</a>
										</li>

										<li class="dropdown">
											<a data-toggle="dropdown" class="dropdown-toggle" href="#">
												<i class="purple ace-icon fa fa-magic bigger-120"></i>

												Miscelaneos
												<i class="ace-icon fa fa-caret-down"></i>
											</a>

											<ul class="dropdown-menu dropdown-lighter dropdown-125">
												<li>
													<a data-toggle="tab" href="#faq-tab-4"> Affiliates </a>
												</li>

												<li>
													<a data-toggle="tab" href="#faq-tab-4"> Merchants </a>
												</li>
											</ul>
										</li><!-- /.dropdown -->
									</ul>

									<div class="tab-content no-border padding-24">
										<div id="faq-tab-1" class="tab-pane fade in active">
											<h4 class="blue">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Preguntas generales sobre el sistema.
											</h4>

											<div class="space-8"></div>

											<div id="faq-list-1" class="panel-group accordion-style1 accordion-style2">
												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-1" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

															<i class="ace-icon fa fa-user bigger-130"></i>
															&nbsp; En que esta programado?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-1">
														<div class="panel-body">
														Esta programado en PHP, con tecnologia HTML5, CSS3, FontAwesome, Bootstrap, Fuentes de Google, Glyphcons, Ace, Fuelux UI, JQuery, Y otros componentes de desarroladores.	
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-2" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

															<i class="ace-icon fa fa-sort-amount-desc"></i>
															&nbsp; ¿Para que sirve las tecnologias utlizadas?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-2">
														<div class="panel-body">
															<div id="faq-list-nested-1" class="panel-group accordion-style1 accordion-style2">
																<div class="panel panel-default">
																	<div class="panel-heading">
																		<a href="#faq-list-1-sub-1" data-parent="#faq-list-nested-1" data-toggle="collapse" class="accordion-toggle collapsed">
																			<i class="ace-icon fa fa-plus smaller-80 middle" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
									   										¿Que es HTML?
																		</a>
																	</div>

																	<div class="panel-collapse collapse" id="faq-list-1-sub-1">
																		<div class="panel-body">
																		HTML es un lenguaje de maquetado. ;)
																		</div>
																	</div>
																</div>

																<div class="panel panel-default">
																	<div class="panel-heading">
																		<a href="#faq-list-1-sub-2" data-parent="#faq-list-nested-1" data-toggle="collapse" class="accordion-toggle collapsed">
																			<i class="ace-icon fa fa-plus smaller-80 middle" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
									  ¿Que es PHP?
																		</a>
																	</div>

																	<div class="panel-collapse collapse" id="faq-list-1-sub-2">
																		<div class="panel-body">
																		PHP es un lenguaje de programacion en el cual se plasma la logica de los sistemas basados en la web.
																		</div>
																	</div>
																</div>

																<div class="panel panel-default">
																	<div class="panel-heading">
																		<a href="#faq-list-1-sub-3" data-parent="#faq-list-nested-1" data-toggle="collapse" class="accordion-toggle collapsed">
																			<i class="ace-icon fa fa-plus smaller-80 middle" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
									  ¿Que es Javascript y JQuery?
																		</a>
																	</div>

																	<div class="panel-collapse collapse" id="faq-list-1-sub-3">
																		<div class="panel-body">
																		Javascript es un lenguaje de programacion de cliente, en el cual se puede crear todo tipo de interaccion con el cliente.
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-3" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

															<i class="ace-icon fa fa-credit-card bigger-130"></i>
															&nbsp; ¿El sistema es gratuito?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-3">
														<div class="panel-body">
														El sistema esta licenciado bajo licencia MIT, el cual permite el uso del sistema de manera gratuita.
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-4" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

															<i class="ace-icon fa fa-files-o bigger-130"></i>
															&nbsp; ¿Como puedo editar el sistema?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-4">
														<div class="panel-body">
														Solo deberas abrir los archivos con un editor de texto y modificarlo a tu gusto. Aunque deberas tener conocimiento sobre las tecnologias utilizadas.
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-5" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

															<i class="ace-icon fa fa-cog bigger-130"></i>
															&nbsp; ¿Que tan seguro es el sistema?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-5">
														<div class="panel-body">
														El sistema es tan seguro como las personas que lo manejan, si el administrador es descuidado la seguridad sera poca, pero si el administrador esta al tanto de lo que sucede con el sistema, estara seguro. Ademas el sistema intrgra las mas avanzadas tecnicas de encubrimiento de datos.
														</div>
													</div>
												</div>
											</div>
										</div>

										<div id="faq-tab-2" class="tab-pane fade">
											<h4 class="blue">
												<i class="green ace-icon fa fa-user bigger-110"></i>
												Preguntas sobre las cuentas.
											</h4>

											<div class="space-8"></div>

											<div id="faq-list-2" class="panel-group accordion-style1 accordion-style2">
												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-2-1" data-parent="#faq-list-2" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-right smaller-80" data-icon-hide="ace-icon fa fa-chevron-down align-top" data-icon-show="ace-icon fa fa-chevron-right"></i>&nbsp;
						¿La cuenta para entrar al sistema solamente la puede crear el administrador?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-2-1">
														<div class="panel-body">
														Si, por seguridad solamente se puede crear cuentas por el administrador, si desea una, debera solicitarla a su administrador de sistemas.
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-2-2" data-parent="#faq-list-2" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-right smaller-80" data-icon-hide="ace-icon fa fa-chevron-down align-top" data-icon-show="ace-icon fa fa-chevron-right"></i>&nbsp;
					  	¡No puedo acceder a mi cuenta!
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-2-2">
														<div class="panel-body">
														Si no puedes acceder a tu cuenta, puedes solicitar una nueva por el formulario de "Recuperar contraseña", si el modulo no esta activado, deberas pedirle una nueva cuenta al administrador de sistemas.
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-2-3" data-parent="#faq-list-2" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-right middle smaller-80" data-icon-hide="ace-icon fa fa-chevron-down align-top" data-icon-show="ace-icon fa fa-chevron-right"></i>&nbsp;
					  ¿Como cambio mi contraseña?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-2-3">
														<div class="panel-body">
														Desde el panel de control del sistema, al lado de su foto en la parte superior derecha, abre el menu y vaya a configuracion, en la nueva ventana podra cambiar los datos de su cuenta de administrador
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-2-4" data-parent="#faq-list-2" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-right smaller-80" data-icon-hide="ace-icon fa fa-chevron-down align-top" data-icon-show="ace-icon fa fa-chevron-right"></i>&nbsp;
					  ¿No recuerdo que hago aqui?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-2-4">
														<div class="panel-body">
														No tengo respuesta a eso :/
														</div>
													</div>
												</div>
											</div>
										</div>

										<div id="faq-tab-3" class="tab-pane fade">
											<h4 class="blue">
												<i class="orange ace-icon fa fa-credit-card bigger-110"></i>
												Payment Questions
											</h4>

											<div class="space-8"></div>

											<div id="faq-list-3" class="panel-group accordion-style1 accordion-style2">
												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-3-1" data-parent="#faq-list-3" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-plus smaller-80" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
						Enim eiusmod high life accusamus terry richardson?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-3-1">
														<div class="panel-body">
															Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-3-2" data-parent="#faq-list-3" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-plus smaller-80" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
					  Single-origin coffee nulla assumenda shoreditch et?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-3-2">
														<div class="panel-body">
															Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-3-3" data-parent="#faq-list-3" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-plus smaller-80" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
					  Sunt aliqua put a bird on it squid?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-3-3">
														<div class="panel-body">
															Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-3-4" data-parent="#faq-list-3" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-plus smaller-80" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
					  Brunch 3 wolf moon tempor sunt aliqua put?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-3-4">
														<div class="panel-body">
															Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
														</div>
													</div>
												</div>
											</div>
										</div>

										<div id="faq-tab-4" class="tab-pane fade">
											<h4 class="blue">
												<i class="purple ace-icon fa fa-magic bigger-110"></i>
												Miscellaneous Questions
											</h4>

											<div class="space-8"></div>

											<div id="faq-list-4" class="panel-group accordion-style1 accordion-style2">
												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-4-1" data-parent="#faq-list-4" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-hand-o-right" data-icon-hide="ace-icon fa fa-hand-o-down" data-icon-show="ace-icon fa fa-hand-o-right"></i>&nbsp;
						Enim eiusmod high life accusamus terry richardson?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-4-1">
														<div class="panel-body">
															Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-4-2" data-parent="#faq-list-4" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-frown-o bigger-120" data-icon-hide="ace-icon fa fa-smile-o" data-icon-show="ace-icon fa fa-frown-o"></i>&nbsp;
					  Single-origin coffee nulla assumenda shoreditch et?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-4-2">
														<div class="panel-body">
															Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-4-3" data-parent="#faq-list-4" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-plus smaller-80" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
					  Sunt aliqua put a bird on it squid?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-4-3">
														<div class="panel-body">
															Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-4-4" data-parent="#faq-list-4" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-plus smaller-80" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
					  Brunch 3 wolf moon tempor sunt aliqua put?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-4-4">
														<div class="panel-body">
															Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Sistema</span>
							&copy; 2015
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
</html>
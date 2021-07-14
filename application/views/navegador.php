<?php
	if($idSis_Empresa){
		#$_SESSION['Acesso']['idSis_Empresa'] = $idSis_Empresa;
	}
?>
<section id="banner" class="img-responsive">
	<div class="bg-color">
		<nav class="navbar navbar-inverse navbar-fixed-top header-menu">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>					
					<a class="navbar-brand" href="index.php"><img src="<?php echo $idSis_Empresa ?>/documentos/miniatura/<?php echo $row_documento['Logo_Nav']; ?>"></a>
					<!--
					<?php if(isset($_SESSION['Nome_Cliente'.$idSis_Empresa])){ ?>
						<a class="navbar-brand-nome"style="color: #FFFFFF" href=""><?php echo utf8_encode($_SESSION['Nome_Cliente'.$idSis_Empresa]);?></a>
					<?php }else{ ?>
						<a class="navbar-brand-nome "style="color: #FFFFFF" href="login_cliente.php">!! Login do Cliente !!</a>
					<?php } ?>
					-->
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item">
							<a class="nav-link" href="contato.php">Fale Conosco</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="#cta-1">Planos</a>
						</li>
						
						<?php if(isset($_SESSION['Nome_Cliente'.$idSis_Empresa])){ ?>
							<li class="nav-item">
								<a class="nav-link" href="meu_carrinho.php">Meu Carrinho</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="meus_pedidos.php">Meus Pedidos</a>
							</li>
						<?php } ?>
						
						<li class="nav-item">
							<?php if(isset($_SESSION['Nome_Cliente'.$idSis_Empresa])){ ?>
								<a class="nav-link" href="sair.php">Sair</a>							
							<?php } else { ?>
								<a class="nav-link" href="../sistema/login/index2">Plataforma</a>
							<?php } ?>
						
						</li>
						<!--
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Login <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" aria-labelledby="dropdown01">
								
								<li>
									<?php if(isset($_SESSION['Nome_Cliente'.$idSis_Empresa])){ ?>
										<a class="dropdown-item" href="sair.php">
											<img class="img-circle " width='40' src="../<?php echo $row_empresa['Site']; ?>/<?php echo $row_empresa['idSis_Empresa']; ?>/clientes/miniatura/<?php echo $_SESSION['Arquivo_Cliente'.$idSis_Empresa]; ?>" alt=""> 
											<?php echo utf8_encode($_SESSION['Nome_Cliente'.$idSis_Empresa]);?> 
											/ Deslogar
										</a>							
									<?php } else { ?>	
										<a class="dropdown-item" href="login_cliente.php">
											Login do Cliente:
										</a>
									<?php } ?>
								</li>
								<li role="separator" class="divider"></li>
								
								<li>
									<a class="dropdown-item" target="_blank" href="../<?php #echo $sistema;?>/login/index2">Acessar Plataforma:</a>
									<a class="dropdown-item" href="../<?php #echo $sistema;?>/login/index2">Acessar Plataforma</a>
									<a class="dropdown-item" href="../sistema/login/index2">Acessar Plataforma</a>
								</li>
							</ul>
						</li>
						-->
					</ul>
				</div>		
			</div>
		</nav>
				
		<div class="container">
			<div class="row">
				<div class="banner-info">
					<div data-interval="3000" id="carouselSite" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselSite" data-slide-to="0" class="active"></li>
							<li data-target="#carouselSite" data-slide-to="1"></li>
							<li data-target="#carouselSite" data-slide-to="2"></li>
							<li data-target="#carouselSite" data-slide-to="3"></li>			
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<img src="<?php echo $idSis_Empresa ?>/documentos/miniatura/Slide1.jpg" class="img-responsive d-block">												
							</div>
							<div class="item">
								<img src="<?php echo $idSis_Empresa ?>/documentos/miniatura/Slide2.jpg" class="img-responsive d-block">												
							</div>
							<div class="item">
								<img src="<?php echo $idSis_Empresa ?>/documentos/miniatura/Slide3.jpg" class="img-responsive d-block">												
							</div>
							<div class="item">
								<img src="<?php echo $idSis_Empresa ?>/documentos/miniatura/Slide4.jpg" class="img-responsive d-block">												
							</div>
						</div>
						<!--
						<a class="left carousel-control" href="#carouselSite" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Anterior</span>
						</a>
						<a class="right carousel-control" href="#carouselSite" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Posterior</span>
						</a>
						-->
					</div>													
					
				
					<!--
					<div class="banner-logo text-center">
						<img src="img/logo1.png" class="img-responsive">
					</div>
					-->
					<div class=" col-md-12 col-sm-12 col-xs-12 banner-text text-center ">
						<!--
						<div class="form-group text-center">
							<h3 class="white">Mais que uma Plataforma.<br>Um lugar de bons neg?cios!</h3>
						</div>
						-->
						<div class="row">
								
							<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 col-xms-6 form-group text-center">
								<a  type="button" class="btn btn-sm btn-danger btn-block text-left" href="../sistema/loginempresa/registrar" role="button" > 
									 Cadastrar Empresa!
								</a>											
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-xms-6 form-group text-center">
								<a  type="button" class="btn btn-sm btn-info btn-block text-left" href="../sistema/login/index2" role="button" > 
									 Acessar sua Empresa!
								</a>											
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-xms-6 form-group text-center">
								<a  type="button" class="btn btn-sm btn-warning btn-block text-left" href="../sistema/pesquisar/empresas" role="button" > 
									 Pesquisar Empresas!
								</a>											
							</div>	
						</div>
					</div>
				</div>
			</div>
			<div class="overlay-detail text-center">
				<a href="#service"><i class="fa fa-angle-down"></i></a>
			</div>
		</div>
	</div>
</section>		
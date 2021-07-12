<?php
	if($idSis_Empresa){
		$_SESSION['Acesso']['idSis_Empresa'] = $idSis_Empresa;
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
					<a class="navbar-brand" href="produtos.php"><img src="<?php echo $idSis_Empresa ?>/documentos/miniatura/<?php echo $row_documento['Logo_Nav']; ?>"></a>
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
							<a class="nav-link" href="produtos.php">Planos</a>
						</li>			
						<?php if(isset($_SESSION['Nome_Cliente'.$idSis_Empresa])){ ?>
							<li class="nav-item">
								<a class="nav-link" href="meu_carrinho.php">Meu Carrinho</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="meus_pedidos.php">Meus Pedidos</a>
							</li>
						<?php } ?>
						<!--
						<li class="nav-item">
							<?php if(isset($_SESSION['Nome_Cliente'.$idSis_Empresa])){ ?>
								<a class="nav-link" href="sair.php">Sair</a>							
							<?php } else { ?>
								<a class="nav-link" href="login_cliente.php">Login</a>
							<?php } ?>
						
						</li>
						-->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Login <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" aria-labelledby="dropdown01">
								<!--
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
								-->
								<li>
									<!--<a class="dropdown-item" target="_blank" href="../<?php #echo $sistema;?>/login/index2">Acessar Plataforma:</a>
									<a class="dropdown-item" href="../<?php #echo $sistema;?>/login/index2">Acessar Plataforma</a>-->
									<a class="dropdown-item" href="../sistema/login/index2">Acessar Plataforma</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>		
			</div>
		</nav>
	</div>
</section>		
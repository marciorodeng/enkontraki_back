<?php
	if($idSis_Empresa){
		$_SESSION['Acesso']['idSis_Empresa'] = $idSis_Empresa;
	}
?>
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
			
			<?php if(isset($_SESSION['Nome_Cliente'.$idSis_Empresa])){ ?>
				<a class="navbar-brand-nome"style="color: #FFFFFF" href=""><?php echo utf8_encode($_SESSION['Nome_Cliente'.$idSis_Empresa]);?></a>
			<?php }else{ ?>
				<a class="navbar-brand-nome "style="color: #FFFFFF" href="login_cliente.php">!! Login do Cliente !!</a>
			<?php } ?>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link" href="contato.php">Fale Conosco</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="produtos.php">Manutenção</a>
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
						<a class="nav-link" href="login_cliente.php">Login</a>
					<?php } ?>
				
				</li>
			</ul>
		</div>		
	</div>
</nav>
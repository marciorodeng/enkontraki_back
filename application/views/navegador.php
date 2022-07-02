<section id="banner" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="bg-color">
		<nav class="navbar navbar-inverse navbar-fixed-top navbar-menu">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>					
				<a class="navbar-brand navbar-logo" href="" data-toggle="modal" data-target="#buscaModal">
					<img src="<?php echo $idSis_Empresa ?>/documentos/miniatura/<?php echo $row_documento['Logo_Nav']; ?>">
				</a>
			</div>
			<!--
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-2">
				<a type="button" class="" href="" data-toggle="modal" data-target="#buscaModal">
					<img class="" type="button"  width='20' src="../sistema/arquivos/imagens/lupa.png">
				</a>
			</div>
			-->
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right navbar-fonte">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="dicas.php">Dicas</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link " href="pesquisar.php" >Empresas </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Fale Conosco</a>
					</li>
					<li class="nav-item dropdown">
						<?php if(isset($_SESSION['id_Admin'.$idSis_Empresa])){ ?>
							<a style="font-size:20px;" class="btn btn-success nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="container-2"> 
									<img class="img-circle img-responsive" style="width:30px; height:30px; margin-top:-10px; margin-bottom:-3px" src="../enkontraki/1/documentos/miniatura/icone.jpg">
									<span class="caret" style="margin-top:5px; margin-left:10px"></span>
								</div>
							</a>
							<ul class="dropdown-menu" aria-labelledby="dropdown01">
								<li>
									<a class="dropdown-item" href="faturas.php">Faturas</a>
								</li>
									<li role="separator" class="divider"></li>
								<li>
									<a class="dropdown-item" href="sair_admin.php"> 
										Deslogar - <?php echo $_SESSION['Nome_Admin'.$idSis_Empresa];?> 
									</a>
								</li>
							</ul>
						<?php }else{ ?>
							<a style="font-size:20px;" class="btn btn-danger nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="container-2">
									<?php if(isset($_SESSION['id_Cliente'.$idSis_Empresa])){ ?> 
										<img class="img-circle img-responsive" style="width:30px; height:30px; margin-top:-10px; margin-bottom:-3px" src="../<?php echo $_SESSION['Site_Cliente'.$idSis_Empresa];?>/<?php echo $_SESSION['id_Cliente'.$idSis_Empresa];?>/documentos/miniatura/<?php echo $_SESSION['Logo_Cliente'.$idSis_Empresa];?>">
									<?php } else{ ?>
										Sou Cliente 
									<?php } ?>
									<span class="caret" style="margin-top:5px; margin-left:10px"></span>
								</div>
							</a>
							<ul class="dropdown-menu" aria-labelledby="dropdown01">
								<li>
									<a class="dropdown-item" href="../sistema/login/index2">Painel de Controle</a>
								</li>
								<li role="separator" class="divider"></li>
								<?php if(isset($_SESSION['id_Cliente'.$idSis_Empresa])){ ?>
									<li>
										<a class="dropdown-item" href="minhas_faturas.php">Minhas Faturas</a>
									</li>
									<li role="separator" class="divider"></li>
									<li>
										<a class="dropdown-item" href="sair.php">
											Deslogar - <?php echo $_SESSION['Nome_Cliente'.$idSis_Empresa];?>
										</a>
									</li>
								<?php } else{ ?>
									<li>
										<a class="dropdown-item" href="login_cliente.php">Manutenção</a>
									</li>
								<?php } ?>
							</ul>							
						<?php } ?>
					</li>
				</ul>
			</div>	
		</nav>

	</div>
	

</section>
<section id="slides" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="banner-info">
			<div data-interval="15000" id="carouselSite" class="carousel slide" data-ride="carousel">
				<!--
				<ol class="carousel-indicators">
					<li data-target="#carouselSite" data-slide-to="0" class="active"></li>
					<li data-target="#carouselSite" data-slide-to="1"></li>			
				</ol>
				-->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="<?php echo $idSis_Empresa ?>/documentos/miniatura/Slide1.jpg" class="img-responsive d-block">												
					</div>
					<div class="item">
						<img src="<?php echo $idSis_Empresa ?>/documentos/miniatura/Slide1.jpg" class="img-responsive d-block">												
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
		</div>
</section>
			
	<div id="buscaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-warning">
					<div class="row">
						<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
							<h3 class="modal-title" id="buscaModalLabel">Pesquisar na Plataforma</h3>
							<div class="row">
								<div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 mb-3 ">	
									<div class="custom-control custom-radio">
										<input type="radio" name="SetBusca" class="custom-control-input "  id="SetProduto" value="PD"  checked>
										<label class="custom-control-label" for="Produto">Produtos</label>
									</div>
								</div>
								<div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 mb-3 ">	
									<div class="custom-control custom-radio">
										<input type="radio" name="SetBusca" class="custom-control-input " id="SetPromocao" value="PM">
										<label class="custom-control-label" for="Promocao">Promoções</label>
									</div>
								</div>
								<div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 mb-3 ">	
									<div class="custom-control custom-radio">
										<input type="radio" name="SetBusca" class="custom-control-input " id="SetEmpresa" value="EM" >
										<label class="custom-control-label" for="Empresa">Empresas</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpaBuscaProduto(), limpaBuscaPromocao(), limpaBuscaEmpresa()">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<input class="form-control input-produto" type="text" name="Produto" id="Produto" maxlength="255" placeholder="Busca Produto e Serviços">
							<input class="form-control input-promocao" type="text" name="Promocao" id="Promocao" maxlength="255" placeholder="Busca Promoções">
							<input class="form-control input-empresa" type="text" name="Empresa" id="Empresa" maxlength="255" placeholder="Busca Empresas e Atuações">
						</div>
					</div>	
				</div>
				<div class="modal-body">
					<div class="input_fields_produtos"></div>
					<div class="input_fields_promocao"></div>
					<div class="input_fields_empresa"></div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
							<button type="button" class="btn btn-primary" data-dismiss="modal" name="botaoFecharBusca" id="botaoFecharBusca" onclick="limpaBuscaProduto(), limpaBuscaPromocao(), limpaBuscaEmpresa()">
								<span class="glyphicon glyphicon-remove"></span> Fechar
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
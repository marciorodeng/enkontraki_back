<?php
	if(isset($_SESSION['id_Cliente'.$idSis_Empresa])){
		$cliente = $_SESSION['id_Cliente'.$idSis_Empresa];
		}else{
		unset(	$_SESSION['id_Cliente'.$idSis_Empresa],
		$_SESSION['Nome_Cliente'.$idSis_Empresa]
		);	
	}	
?>

<section id="about" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="container">	
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<br>
				<h1 class="ser-title">Enkontraki</h1>
				<hr class="botm-line">
				<figure>
					<div class="boxVideo">
						<iframe   width='420' height='315' class="thumbnail" src="https://www.youtube.com/embed/MYs0zWgxYOI?&autoplay=1" title="Enkontraki Plataforma Didital" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</figure>
				<?php if(isset($_SESSION['id_Admin'.$idSis_Empresa])){ ?>
					<a href="../sistema/loginempresa/registrar" class="btn btn-block btn-danger text-center" style="color:#fff; margin-bottom:5px; margin-top: 5px">
						Cadastrar <span style="color:#FFEE00; font-size: 20px;">Nova Empresa</span>
					</a>
				<?php }else{ ?>	
					<a href="https://api.whatsapp.com/send?phone=5521987591466&text=Olá Márcio. Quero experimentar o uso da Plataforma. Meu nome é " target="_blank" class="btn btn-block btn-success text-center" style="color:#fff; margin-bottom:5px; margin-top: 5px">
						<img width='30' src="<?php echo $idSis_Empresa ?>/documentos/miniatura/whatsapp.png" style="margin-top:-2px">
						Entre em contato <span style="color:#FFEE00; font-size: 20px;">AGORA</span>
					</a>
				<?php } ?>
			</div>
			<div id="topicos" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<br>
				<h2 class="ser-title">Tudo Integrado</h2>
				<hr class="botm-line">
				<div class="row" style="margin-top:15px;">	
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<div class="thumbnail thumbnail0 sombra-about">
							<h4 style="text-align: left;">Clientes</h4>
							<span class="glyphicon glyphicon-user"></span>
							<h4 style="text-align: right;">Fornecedores</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<div class="thumbnail thumbnail0 sombra-about">
							<h4 style="text-align: left;">Produtos</h4>
							<span class="glyphicon glyphicon-gift"></span>
							<h4 style="text-align: right;">Serviços</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<div class="thumbnail thumbnail0 sombra-about"> 
							<h4 style="text-align: left;">Vendas</h4>
							<span class="glyphicon glyphicon-arrow-up"></span>
							<span class="glyphicon glyphicon-arrow-down"></span>
							<h4 style="text-align: right;">Entregas</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<div class="thumbnail thumbnail0 sombra-about"> 
							<h4 style="text-align: left;">Receitas</h4>
							<span class="glyphicon glyphicon-th-list"></span>
							<h4 style="text-align: right;">Despesas</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<div class="thumbnail thumbnail0 sombra-about"> 
							<h4 style="text-align: left;">Cash Back</h4>
							<span class="glyphicon glyphicon-usd"></span>
							<span class="glyphicon glyphicon-tags"></span>
							<h4 style="text-align: right;">Cupom</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<div class="thumbnail thumbnail0 sombra-about"> 
							<h4 style="text-align: left;">Agendas</h4>
							<span class="glyphicon glyphicon-calendar"></span>
							<h4 style="text-align: right;">Compromissos</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<div class="thumbnail thumbnail0 sombra-about"> 
							<h4 style="text-align: left;">Loja</h4>
							<span class="glyphicon glyphicon-shopping-cart"></span>
							<h4 style="text-align: right;">Online</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<div class="thumbnail thumbnail0 sombra-about"> 
							<h4 style="text-align: left;">Redes</h4>
							<span class="glyphicon glyphicon-user"></span>
							<span class="glyphicon glyphicon-user"></span>
							<span class="glyphicon glyphicon-user"></span>
							<h4 style="text-align: right;">Sociais</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="thumbnail thumbnail0 sombra-about"> 
							<h4 style="text-align: left;">Marketing</h4>
							<span class="glyphicon glyphicon-shopping-cart"></span>
							<h4 style="text-align: right;">Digital</h4>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
</section>

<section id="testimonial" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="container">
		<div class="row">	
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<br>
				<h2 class="ser-title">Depoimentos</h2>
				<hr class="botm-line">
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="testi-details">
					<p style="text-indent: 10px;" >Depois que aderi a Plataforma Enkontraki, o trabalho da minha empresa ficou mais dinâmico e organizado.</p>
				</div>
				<div class="testi-info">
					<a href="#">
						<img src="1/documentos/miniatura/moises.jpeg" alt="Moises antunes gerente da empresa Personalizamos você" class="img-responsive">
					</a>
					<h3>Moisés Antunes</h3>
					<h4>Click na Loja</h4>
				</div>
				<a href="../clicknaloja/inicial.php" class="btn btn-block btn-info text-center" style="color:#ffffff" target="_blank">Conheça a "Click na Loja"</a>
				<br>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="testi-details">
					<p style="text-indent: 10px;" >Após muitas tentativas negativas, finalmente encontrei um sistema ao qual me atende perfeitamente e otimiza bastante o dia a dia, 
													simplesmente excelente, sem falar no suporte sempre a disposição para dirimir qualquer dúvida. Parabéns a toda equipe.</p>
				</div>
				<div class="testi-info">
					<a href="#">
						<img src="1/documentos/miniatura/chamon.jpeg" alt="Chamon Pereira gerente da empresa Ateliê Pet Zen" class="img-responsive">
					</a>
					<h3>Chamon Pereira</h3>
					<h4>Ateliê Pet Zen</h4>
				</div>
				<a href="../ateliepetzen/inicial.php" class="btn btn-block btn-info text-center" style="color:#ffffff" target="_blank">Conheça o "Ateliê Pet Zen"</a>
				<br>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="testi-details">
					<p style="text-indent: 10px;" >Faça como eu, deixe o passado pra trás. Otimize seu tempo com a Plataforma Enkontraki. Rápida, simples e prática.</p>
				</div>
				<div class="testi-info">
					<a href="#">
						<img src="1/documentos/miniatura/ulisses.jpeg" alt="Ulisses Povoas gerente da empresa Ulisses Car" class="img-responsive">
					</a>
					<h3>Ulisses Povoas</h3>
					<h4>Ulisses Car</h4>
				</div>
				<a href="../ulissescar/inicial.php" class="btn btn-block btn-info text-center" style="color:#ffffff" target="_blank">Conheça a "Ulisses Car"</a>
				<br>
			</div>
		</div>
	</div>
</section>
<section id="cta-1" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<br>
				<h2 class="ser-title">Experimente</h2>
				<hr class="botm-line">
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
				<div class="thumbnail thumbnail2 sombra-cta-1">
					<h3 class="sombra-texto">Do seu jeito!</h3>
					<h3 style="color:#ff2a00">
						Teste Grátis
					</h3>
					<h4 style="color:#5151fc">Fale Conosco</h4>
					<h4>Vamos juntos<br>traçar uma estratégia<br>sob medida <br>pra você</h4>
					<h4>(21) 987-591-466</h4>
				</div>
				<?php if(isset($_SESSION['id_Admin'.$idSis_Empresa])){ ?>
					<a href="../sistema/loginempresa/registrar" class="btn btn-block btn-danger text-center" style="color:#fff; margin-bottom:5px; margin-top: -10px">
						Cadastrar <span style="color:#FFEE00; font-size: 20px;">Nova Empresa</span>
					</a>
				<?php }else{ ?>	
					<a href="https://api.whatsapp.com/send?phone=5521987591466&text=Olá Márcio. Quero experimentar o uso da Plataforma. Meu nome é " target="_blank" class="btn btn-block btn-success text-center" style="color:#fff; margin-bottom:5px; margin-top: -10px">
						<img width='30' src="<?php echo $idSis_Empresa ?>/documentos/miniatura/whatsapp.png" style="margin-top:-2px">
						Entre em contato <span style="color:#FFEE00; font-size: 20px;">AGORA</span>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<section id="doctor-team" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<br>
				<h2 class="ser-title">Nossa Equipe</h2>
				<hr class="botm-line">
			</div>	
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
				<div class="thumbnail thumbnail3 sombra-equipe"> 
					<img src="1/documentos/miniatura/marcio.jpg" alt="Marcio Dias, Engenheiro de Telecomunicações" class="team-img">
					<div class="caption">
						<h4>Marcio Dias</h4>
						<p>Engenheiro</p>
						<ul class="list-inline">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>	
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
				<div class="thumbnail thumbnail3 sombra-equipe"> 
					<img src="1/documentos/miniatura/Rodrigo.jpeg" alt="Rodrigo Campos, Engenheiro de Telecomunicações" class="team-img">
					<div class="caption">
						<h4>Rodrigo Campos</h4>
						<p>Engenheiro</p>
						<ul class="list-inline">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>	
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
				<div class="thumbnail thumbnail3 sombra-equipe"> 
					<img src="1/documentos/miniatura/Luiz.jpeg" alt="Luiz Antônio, Engenheiro de Telecomunicações" class="team-img">
					<div class="caption">
						<h4>Luiz Antônio</h4>
						<p>Engenheiro</p>
						<ul class="list-inline">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="contact" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="container">	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<br>
				<h2 class="ser-title">Fale Conosco</h2>
				<hr class="botm-line">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h3>Informação e contato</h3>
				<div class="space"></div>
				<h4><?php echo utf8_encode($row_empresa['EnderecoEmpresa']);?>, <?php echo utf8_encode($row_empresa['NumeroEmpresa']);?> - <?php echo utf8_encode($row_empresa['ComplementoEmpresa']);?><br>
					<?php echo utf8_encode($row_empresa['BairroEmpresa']);?> - <?php echo utf8_encode($row_empresa['MunicipioEmpresa']);?> - <?php echo utf8_encode($row_empresa['EstadoEmpresa']);?><br>
				Cep: <?php echo $row_empresa['CepEmpresa'];?>.</h4>
				<div class="space"></div>
				<p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i><?php echo $row_empresa['Email'];?></p>
				<div class="space"></div>
				<p><i class="fa fa-phone fa-fw pull-left fa-2x"></i><h4>TEL:  <?php echo $row_empresa['Telefone'];?></h4></p>
				<p>
					<i class="fa fa-phone fa-fw pull-left fa-2x"></i>
					<h4>
						Whatsapp: <?php echo $row_empresa['Telefone'];?>
						<a href="https://api.whatsapp.com/send?phone=55<?php echo $row_empresa['Telefone'];?>&text=" target="_blank" style="">
							<svg enable-background="new 0 0 512 512" width="30" height="30" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M256.064,0h-0.128l0,0C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104  l98.4-31.456C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z" fill="#4CAF50"/><path d="m405.02 361.5c-6.176 17.44-30.688 31.904-50.24 36.128-13.376 2.848-30.848 5.12-89.664-19.264-75.232-31.168-123.68-107.62-127.46-112.58-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624 26.176-62.304c6.176-6.304 16.384-9.184 26.176-9.184 3.168 0 6.016 0.16 8.576 0.288 7.52 0.32 11.296 0.768 16.256 12.64 6.176 14.88 21.216 51.616 23.008 55.392 1.824 3.776 3.648 8.896 1.088 13.856-2.4 5.12-4.512 7.392-8.288 11.744s-7.36 7.68-11.136 12.352c-3.456 4.064-7.36 8.416-3.008 15.936 4.352 7.36 19.392 31.904 41.536 51.616 28.576 25.44 51.744 33.568 60.032 37.024 6.176 2.56 13.536 1.952 18.048-2.848 5.728-6.176 12.8-16.416 20-26.496 5.12-7.232 11.584-8.128 18.368-5.568 6.912 2.4 43.488 20.48 51.008 24.224 7.52 3.776 12.48 5.568 14.304 8.736 1.792 3.168 1.792 18.048-4.384 35.52z" fill="#FAFAFA"/></svg>
						</a>
					</h4>
				</p>
			</div>
		</div>
	</div>
</section>	

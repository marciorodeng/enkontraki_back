<footer id="footer" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="top-footer">
		<div class="container">
			<div class="row">
				<!--
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 ">
					
					<div class="ftr-tle">
						<h4 class="white no-padding">Sobre Nós</h4>
					</div>
					<div class="info-sec">
						<p><?php echo utf8_encode($row_empresa['SobreNos']);?></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 marb20">
					<div class="ftr-tle">
						<h4 class="white no-padding">Atalhos</h4>
					</div>
					<div class="info-sec">
						<ul class="quick-info">
							<li><a href="#slide"><i></i>Slides</a></li>
							<li><a href="produtos.php"><i></i>Produtos</a></li>
							<li><a href="contato.php"><i></i>Fale Conosco</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
					<div class="ftr-tle">
						<h4 class="white no-padding">Atendimento</h4>
					</div>
					<div class="info-sec">
						<p><?php echo utf8_encode($row_empresa['Atendimento']);?></p>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-4 marb20">
					<div class="ftr-tle">
						<h4 class="white no-padding">Siga-nos nas redes sociais</h4>
					</div>
					<div class="info-sec">
						<ul class="social-icon">
							<li class="bglight-blue"><i class="fa fa-facebook"></i></li>
							<li class="bgred"><i class="fa fa-google-plus"></i></li>
							<li class="bgdark-blue"><i class="fa fa-linkedin"></i></li>
							<li class="bglight-blue"><i class="fa fa-twitter"></i></li>
						</ul>
					</div>
				</div>
				-->
			</div>
		</div>
	</div>
	<div class="footer-line">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					<div class="credits">
						<h6>Feito Por <a href="https://www.enkontraki.com.br">enkontraki.com.br</a> .TODOS OS DIREITOS RESERVADOS.<br>
						Todo o conteúdo do site, todas as fotos, imagens, aqui veiculados, são de propriedade e responsabilidade exclusiva da <?php echo utf8_encode($row_empresa['NomeEmpresa']);?>. É vedada qualquer reprodução, total ou parcial, de qualquer elemento de identidade, sem expressa autorização. A violação de qualquer direito mencionado implicará na responsabilização cível e criminal nos termos da Lei.<br>
						<?php echo utf8_encode($row_empresa['NomeEmpresa']);?> - CNPJ: <?php echo utf8_encode($row_empresa['Cnpj']);?> - <?php echo utf8_encode($row_empresa['EnderecoEmpresa']);?>, <?php echo utf8_encode($row_empresa['NumeroEmpresa']);?> - <?php echo utf8_encode($row_empresa['ComplementoEmpresa']);?>
						<?php echo utf8_encode($row_empresa['BairroEmpresa']);?> - <?php echo utf8_encode($row_empresa['MunicipioEmpresa']);?> - <?php echo utf8_encode($row_empresa['EstadoEmpresa']);?> - Cep: <?php echo $row_empresa['CepEmpresa'];?>. <br>
						A inclusão no carrinho não garante o preço e/ou a disponibilidade do produto. Caso os produtos apresentem divergências de valores, o preço válido é o exibido na tela de pagamento. Vendas sujeitas a análise e disponibilidade de estoque.</h6>

					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="https://api.whatsapp.com/send?phone=5521987591466&text=" target="_blank" style="position:fixed;bottom:20px;right:30px;">
		<svg enable-background="new 0 0 512 512" width="50" height="50" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M256.064,0h-0.128l0,0C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104  l98.4-31.456C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z" fill="#4CAF50"/><path d="m405.02 361.5c-6.176 17.44-30.688 31.904-50.24 36.128-13.376 2.848-30.848 5.12-89.664-19.264-75.232-31.168-123.68-107.62-127.46-112.58-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624 26.176-62.304c6.176-6.304 16.384-9.184 26.176-9.184 3.168 0 6.016 0.16 8.576 0.288 7.52 0.32 11.296 0.768 16.256 12.64 6.176 14.88 21.216 51.616 23.008 55.392 1.824 3.776 3.648 8.896 1.088 13.856-2.4 5.12-4.512 7.392-8.288 11.744s-7.36 7.68-11.136 12.352c-3.456 4.064-7.36 8.416-3.008 15.936 4.352 7.36 19.392 31.904 41.536 51.616 28.576 25.44 51.744 33.568 60.032 37.024 6.176 2.56 13.536 1.952 18.048-2.848 5.728-6.176 12.8-16.416 20-26.496 5.12-7.232 11.584-8.128 18.368-5.568 6.912 2.4 43.488 20.48 51.008 24.224 7.52 3.776 12.48 5.568 14.304 8.736 1.792 3.168 1.792 18.048-4.384 35.52z" fill="#FAFAFA"/></svg>
	</a>
</footer>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->			
<script src="../enkontraki_back/js/jquery.min.js"></script>
<script src="../enkontraki_back/js/jquery-ui.js"></script>
<script src="../enkontraki_back/js/pesquisar.js" language="JavaScript"></script>
<script src="../enkontraki_back/js/jquery.mask.min.js"></script>	
<script src="../enkontraki_back/js/bootstrap.min.js"></script> 
<script src="../enkontraki_back/js/carregador.js" language="JavaScript"></script>

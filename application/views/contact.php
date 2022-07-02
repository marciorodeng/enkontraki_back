<?php
	if(isset($_SESSION['id_Cliente'.$idSis_Empresa])){
		$cliente = $_SESSION['id_Cliente'.$idSis_Empresa];
		}else{
		unset(	$_SESSION['id_Cliente'.$idSis_Empresa],
		$_SESSION['Nome_Cliente'.$idSis_Empresa]
		);	
	}	
?>

<section id="contact" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="container">	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<br>
				<h1 class="ser-title">Fale Conosco</h1>
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
	<!--
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">	
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<br>
			<h2 class="ser-title">Envie um e-mail</h2>
			<hr class="botm-line">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="contact-info">
				<p id="resultado">111</p>
				<form id="cadastrarUsuario" action=""  method="POST">
					<div class="form-group">
						<input type="Nome" name="Nome" class="form-control br-radius-zero" placeholder="Seu nome" data-rule="minlen:4" data-msg="Por favor, no mínimo 4 digitos" />
						<div class="validation"></div>
					</div>
					<div class="form-group">
						<input type="email" class="form-control br-radius-zero" name="email" placeholder="Seu E-mail" data-rule="email" data-msg="Por favor, use um e-mail válido" />
						<div class="validation"></div>
					</div>
					<div class="form-group">
						<textarea type="message" class="form-control br-radius-zero" name="message" rows="5" placeholder="Mensagem" data-rule="minlen:10" data-msg="Por favor, escreva algo para nós."></textarea>
						<div class="validation"></div>
					</div>
					<button type="submit" class="btn btn-primary pull-right">Enviar</button>
				</form>
			</div>
		</div>
	</div>
	-->
</section>	

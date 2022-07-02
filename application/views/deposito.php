<?php if(isset($_GET['id'])){ $id_pagamento = addslashes($_GET['id']); ?>

	<section id="contato" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="container">	
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="ser-title">Depósito/ Transf/ Pix</h1>
					<hr class="botm-line">
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h3>Conta:</h3>
					<h4>
						<b>Banco : </b>  NuBank<br>
						<b>Agência : </b>0001<br>
						<b>Conta : </b>77517840-9<br>
						<b>Favorecido : </b>Márcio Rodrigues Dias
					</h4>
					<h3>Chave PIX:</h3>
					<h4>
						<b>Pix : </b>015.146.927-08
					</h4>
					<h3>Após realizar a transferência, favor enviar o comprovante, com o Nº da Fatura <span style="color:#FF0000"><?php echo $id_pagamento;?></span>, para:</h3>
					<h4>
						<b>Whatsapp: </b>21987591466
						<a href="https://api.whatsapp.com/send?phone=5521987591466&text=Fatura <?php echo $id_pagamento;?>" target="_blank" style="">
							<svg enable-background="new 0 0 512 512" width="30" height="30" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M256.064,0h-0.128l0,0C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104  l98.4-31.456C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z" fill="#4CAF50"/><path d="m405.02 361.5c-6.176 17.44-30.688 31.904-50.24 36.128-13.376 2.848-30.848 5.12-89.664-19.264-75.232-31.168-123.68-107.62-127.46-112.58-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624 26.176-62.304c6.176-6.304 16.384-9.184 26.176-9.184 3.168 0 6.016 0.16 8.576 0.288 7.52 0.32 11.296 0.768 16.256 12.64 6.176 14.88 21.216 51.616 23.008 55.392 1.824 3.776 3.648 8.896 1.088 13.856-2.4 5.12-4.512 7.392-8.288 11.744s-7.36 7.68-11.136 12.352c-3.456 4.064-7.36 8.416-3.008 15.936 4.352 7.36 19.392 31.904 41.536 51.616 28.576 25.44 51.744 33.568 60.032 37.024 6.176 2.56 13.536 1.952 18.048-2.848 5.728-6.176 12.8-16.416 20-26.496 5.12-7.232 11.584-8.128 18.368-5.568 6.912 2.4 43.488 20.48 51.008 24.224 7.52 3.776 12.48 5.568 14.304 8.736 1.792 3.168 1.792 18.048-4.384 35.52z" fill="#FAFAFA"/></svg>
						</a>
					</h4>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
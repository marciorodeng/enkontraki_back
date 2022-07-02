
	<?php 
		if(isset($_GET['id'])){
			$id_pagamento = addslashes($_GET['id']);
			/*
			echo '<br>';
			echo $id_pagamento;
			*/
		}
	?>	
	<section id="entrega" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="container">
			<div class="row">	
				<form name="FormularioFormaPagam" id="FormularioFormaPagam" method="post" action="definir_forma_pagam.php" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h1 class="ser-title">Forma de Pagamento</h1>
						<hr class="botm-line">
					</div>
					<br>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 mb-3 ">	
								<div class="custom-control custom-radio locpagloja">
									<input type="radio" name="formapagamento" class="custom-control-input "  id="Deposito" value="9" checked>
									<label class="custom-control-label" for="Deposito">Pix/ Transf/ Deposito</label>
									<img src="../<?php echo $sistema ?>/arquivos/imagens/NaLoja.png" class="img-responsive img-link " width='150'>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 mb-3 ">	
								<div class="custom-control custom-radio locpagcasa">
									<input type="radio" name="formapagamento" class="custom-control-input " id="Debito" value="3" >
									<label class="custom-control-label" for="Debito">Débito </label>
									<img src="../<?php echo $sistema ?>/arquivos/imagens/NaEntrega.png" class="img-responsive img-link " width='150'>
								</div>
							</div>
						</div>
					</div>
					<input type="hidden" name="id_pagamento" id="id_pagamento" value="<?php echo $id_pagamento;?>">
					<br>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<button type="submit" class="btn btn-primary btn-lg btn-block "  name="btnComprar" id="btnComprar"> Próximo Passo</button>
						</div>
					</div>	
					<br>
				</form>
			</div>
		</div>
	</section>
					
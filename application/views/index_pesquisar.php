<section id="service" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<!--
	<br>
	<div class="col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10">
		<a type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#buscaModal">
			<img class="" type="button"  width='20' src="../sistema/arquivos/imagens/lupa.png"> Produtos & Empresas
		</a>
	</div>
	-->
	<div class="col-md-12">
		<br>
		<h2 class="ser-title">Empresas</h2>
		<hr class="botm-line">
	</div>	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<br>					
		<?php
			$empresa = ("
					SELECT 
						idSis_Empresa,
						NomeEmpresa,
						Site,
						Arquivo
					FROM 
						Sis_Empresa
					WHERE 
						idSis_Empresa != 1 AND
						idSis_Empresa != 5
					ORDER BY
						NomeEmpresa ASC
			");
			$read_empresa 	= mysqli_query($conn, $empresa);
			$count_empresa 	= mysqli_num_rows($read_empresa);
			/*
			echo '<br>';
			echo "<pre>";
			print_r($read_empresa);
			echo '<br>';
			echo "<pre>";
			print_r($count_empresa);
			echo "</pre>";
			*/
			if($count_empresa > '0'){
			
				foreach($read_empresa as $read_empresa_view){
					
					?>
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
							<br>
							<div class="card-body  text-center">
								<a href="../<?php echo $read_empresa_view['Site'];?>" target="_blank">
									<img class="team-img img-circle img-responsive" width="200" src="../<?php echo $read_empresa_view['Site'];?>/<?php echo $read_empresa_view['idSis_Empresa'] ?>/documentos/miniatura/<?php echo $read_empresa_view['Arquivo']; ?>" alt="">
								</a>
							</div>
							<div class="card-body  text-left">
								<a href="../<?php echo $read_empresa_view['Site'];?>" target="_blank">
									<h5 class="card-title">
										<?php echo $read_empresa_view['NomeEmpresa'];?> - 
										<?php echo $read_empresa_view['idSis_Empresa'];?>
									</h5>
								</a>	
							</div>
						</div>
					<?php 
				}
			}
		?>
	</div>
	<!--
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
	-->
</section>

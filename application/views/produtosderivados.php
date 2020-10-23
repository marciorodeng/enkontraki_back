<?php
	if(isset($_SESSION['id_Cliente'.$idSis_Empresa])){
		$cliente = $_SESSION['id_Cliente'.$idSis_Empresa];
	}else{
		unset(	$_SESSION['id_Cliente'.$idSis_Empresa],
				$_SESSION['Nome_Cliente'.$idSis_Empresa]
				);	
	}	
	if(isset($_GET['id_modelo'])){	
		$id_modelo = addslashes($_GET['id_modelo']);
	}						
	/*
	echo '<br>';
	echo "<pre>";
	print_r($id_modelo);
	echo "</pre>";
	exit ();
	*/	
?>
<section id="service" class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<?php
				$result_categoria = "SELECT * FROM Tab_Catprod_Pagamento WHERE TipoCatprod_Pagamento = 'S'  ORDER BY Catprod_Pagamento ASC ";
				$read_categoria = mysqli_query($conn, $result_categoria);
				if(mysqli_num_rows($read_categoria) > '0'){?>
					<div class="row">	
						<div class="col-lg-12">
							<h2 class="ser-title ">Serviços</h2>
							<hr class="botm-line">
							<div class="list-group">
								<?php
								foreach($read_categoria as $read_categoria_view){
									echo '<a href="produtos.php?cat='.$read_categoria_view['idTab_Catprod_Pagamento'].'" class="list-group-item">'.$read_categoria_view['Catprod_Pagamento'].'</a>';
								}
								?>
								
							</div>
						</div>
					</div>
				<?php	
				}
				?>
			</div>
			<div class="col-md-9">
				<?php if($row_empresa['EComerce'] == 'S' && isset($_SESSION['id_Cliente'.$idSis_Empresa]) && isset($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]]) && count($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]]) > '0'){ ?>
					<div class="row">	
						<div class="col-md-12">	
							<?php if(isset($_SESSION['id_Cliente'.$idSis_Empresa])){ ?>
								<div class="row">	
									<!--<div class="col-md-6">
										<label></label><br>
										<a href="entrega.php" class="btn btn-success btn-block" name="submeter" id="submeter" onclick="DesabilitaBotao(this.name)">Finalizar Pedido!</a>
									</div>-->
									<div class="col-md-12">
										<label></label><br>
										<a href="entrega.php" class="btn btn-primary btn-block" name="submeter2" id="submeter2" onclick="DesabilitaBotao(this.name)">Carrinho: <?php echo $_SESSION['total_produtos'.$_SESSION['id_Cliente'.$idSis_Empresa]];?> Unid.<br> Se desejar Finalizar a compra,<br> click aqui.</a>
									</div>
									
								</div>
								<div class="alert alert-warning aguardar" role="alert" name="aguardar" id="aguardar">
									Aguarde um instante! Estamos processando sua solicitação!
								</div>							
							<?php } else { ?>
								<div class="col-md-6">
									<a href="login_cliente.php" class="btn btn-danger btn-block" name="submeter" id="submeter" onclick="DesabilitaBotao(this.name)">Logar / Finalizar Pedido</a>
									<div class="alert alert-warning aguardar" role="alert" name="aguardar" id="aguardar">
									  Aguarde um instante! Estamos processando sua solicitação!
									</div>							
								</div>
							<?php } ?>
						</div>
					</div>
					<br>
				<?php } ?>
				<div class="row">
					<div class="col-md-12">
						<?php
							$read_produtos_derivados = mysqli_query($conn, "
							SELECT 
								TV.idTab_Valor_Pagamento,
								TV.idTab_Modelo_Pagamento,
								TV.ValorProduto,
								TV.QtdProdutoDesconto,
								TV.QtdProdutoIncremento,
								TV.Convdesc,
								TV.idTab_Promocao,
								TV.Desconto,
								TPR.Promocao,
								TPR.Descricao,
								TPR.Ativo,
								TPR.VendaSite,
								TPS.idTab_Produtos_Pagamento,
								TPS.idTab_Produto_Pagamento,
								TPS.idSis_Empresa,
								TPS.Nome_Prod,
								TPS.Arquivo,
								TPS.Valor_Produto,
								TOP2.Opcao AS Opcao2,
								TOP1.Opcao AS Opcao1,
								(TV.ValorProduto) AS SubTotal2
							FROM 
								Tab_Valor_Pagamento AS TV
									LEFT JOIN Tab_Produtos_Pagamento AS TPS ON TPS.idTab_Produtos_Pagamento = TV.idTab_Produtos_Pagamento
									LEFT JOIN Tab_Promocao AS TPR ON TPR.idTab_Promocao = TV.idTab_Promocao
									LEFT JOIN Tab_Produto_Pagamento AS TP ON TP.idTab_Produto_Pagamento = TPS.idTab_Produto_Pagamento
									LEFT JOIN Tab_Opcao AS TOP2 ON TOP2.idTab_Opcao = TPS.Opcao_Atributo_1
									LEFT JOIN Tab_Opcao AS TOP1 ON TOP1.idTab_Opcao = TPS.Opcao_Atributo_2

							WHERE 
								TV.idTab_Modelo_Pagamento = '".$id_modelo."'
							ORDER BY 
								TPS.idTab_Produtos_Pagamento ASC
							");
							$valortotal2 = '0';
							if(mysqli_num_rows($read_produtos_derivados) > '0'){
								foreach($read_produtos_derivados as $read_produtos_derivados_view){
									$qtd_incremento = $read_produtos_derivados_view['QtdProdutoIncremento'];
									$id_produto = $read_produtos_derivados_view['idTab_Produtos_Pagamento'];
									$subtotal2 		= $read_produtos_derivados_view['SubTotal2'];
									$valortotal2 	= $subtotal2;
									?>		
									<div class="col-lg-4 col-md-4 col-sm-6 mb-4">
										<div class="img-produtos ">					 
											<img class="team-img " src="../<?php echo $sistema;?>/arquivos/imagens/manutencao.jpg" alt="" class="img-circle img-responsive" width="200">
											<div class="card-body">
												<h5 class="card-title"><?php echo utf8_encode ($read_produtos_derivados_view['Nome_Prod']);?><br> 
																			<?php echo utf8_encode ($read_produtos_derivados_view['Opcao2']);?><br>
																			<?php echo utf8_encode ($read_produtos_derivados_view['Opcao1']);?> - 
																			<?php echo utf8_encode ($read_produtos_derivados_view['Convdesc']);?>
												</h5>
												<h5><?php echo utf8_encode ($read_produtos_derivados_view['QtdProdutoIncremento']);?> Unid. R$ <?php echo number_format($valortotal2,2,",",".");?></h5>
											</div>
											<?php if($loja_aberta){ ?>
												<div class="card-body">
													<?php if($row_empresa['EComerce'] == 'S'){ ?>
														<?php if(isset($_SESSION['id_Cliente'.$idSis_Empresa])){ ?>
															<a href="meu_carrinho.php?carrinho=produto&id=<?php echo $read_produtos_derivados_view['idTab_Valor_Pagamento'];?>" class="btn btn-success" name="submeter" id="submeter" onclick="DesabilitaBotao(this.name),exibirPagar()">Adicionar ao Carrinho</a>
														<?php } else { ?>
															<a href="login_cliente.php" class="btn btn-success " name="submeter" id="submeter" onclick="DesabilitaBotao(this.name)">Logar P/ Adicionar ao Carrinho</a>
														<?php } ?>	
													<?php } ?>
												</div>
											<?php } else { ?>
												<button class="btn btn-warning "  >Loja Fechada</button>
											<?php } ?>
										</div>
									</div>

									<?php 
								}
							}
						?>
					</div>	
				</div>	
			</div>		
		</div>
	</div>
</section>

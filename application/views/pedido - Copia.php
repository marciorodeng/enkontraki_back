<?php 

	$id_pedido = addslashes($_GET['id']);	
	
	if(isset($_SESSION['id_Cliente'.$idSis_Empresa])){
		$cliente = $_SESSION['id_Cliente'.$idSis_Empresa];
	}
	
	$result_cliente = "SELECT * FROM App_Cliente WHERE idApp_Cliente = '".$cliente."'";
	$resultado_cliente = mysqli_query($conn, $result_cliente);
	$row_cliente = mysqli_fetch_assoc($resultado_cliente);
		

	
	if(!isset($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]])){
		$_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]] = array();
	}

?>
<section id="service" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<br>
				<h1 class="ser-title">Fatura <?php echo $id_pedido; ?></h1>
				<hr class="botm-line">
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
				<div class="row">
					
					<div class="col-md-12 order-md-2 mb-4">
						<ul class="list-group mb-3 ">										
							<?php
								$read_produto = mysqli_query($conn, "
																	SELECT 
																		OT.ValorTotalOrca,
																		OT.ValorFrete,
																		OT.ValorBoleto,
																		OT.ValorRestanteOrca,
																		OT.FormaPagamento,
																		OT.Descricao,
																		AP.idApp_Produto_Pagamento,
																		AP.ValorProduto, 
																		AP.QtdProduto,
																		AP.QtdIncrementoProduto,
																		AP.idTab_Produto_Pagamento,
																		AP.idTab_Produtos_Produto,
																		AP.idApp_Pagamento,
																		AP.NomeProduto,
																		TPS.Nome_Prod,
																		TPS.Arquivo
																	FROM 
																		App_Pagamento AS OT
																			LEFT JOIN App_Produto_Pagamento  AS AP ON AP.idApp_Pagamento = OT.idApp_Pagamento
																			LEFT JOIN Tab_Produtos_Pagamento AS TPS ON TPS.idTab_Produtos_Pagamento = AP.idTab_Produtos_Produto
																	WHERE 
																		AP.idApp_Pagamento = '".$id_pedido."'  
																	ORDER BY 
																		AP.idApp_Produto_Pagamento ASC
																	");
								if(mysqli_num_rows($read_produto) > '0'){
									$total_valor = 0;
									$total_produtos = 0;
									$cont_item = 0;
									foreach($read_produto as $read_produto_view){
										$descricao = $read_produto_view['Descricao'];
										$sub_total = $read_produto_view['ValorProduto'] * $read_produto_view['QtdProduto'];
										$total_valor += $sub_total;
										$sub_total_produtos = $read_produto_view['QtdIncrementoProduto'] * $read_produto_view['QtdProduto'];
										$total_produtos += $sub_total_produtos;
										$total_orca = $read_produto_view['ValorRestanteOrca'];
										$valor_frete = $read_produto_view['ValorFrete'];
										$valor_boleto = $read_produto_view['ValorBoleto'];
										$valor_total = ($total_orca + $valor_frete + $valor_boleto);
										$cont_item++;
										?>		
										<li class="list-group-item d-flex justify-content-between lh-condensed fundo">
											
												<div class="row img-prod-pag">	
													<div class="col-md-3 ">	
														<div class="col-md-4 ">
															<span class="text-muted">Item <?php echo $cont_item;?> </span> 
														</div>
														<div class="col-md-8 ">
															<img class="team-img img-circle img-responsive" src="<?php echo $idSis_Empresa ?>/produtos/miniatura/<?php echo $read_produto_view['Arquivo']; ?>" alt="" width='50' >
														</div>														
													</div>
													<div class="col-md-9 ">
														<div class="row">
															<h4 class="my-0"><?php echo utf8_encode ($read_produto_view['NomeProduto']);?></h4>
															<!--<small class="text-muted">Brief description</small>-->
															</div>
														<div class="row">	
															<!--<span class="text-muted">Valor = R$ <?php echo number_format($read_produto_view['ValorProduto'],2,",",".");?> / </span>--> 
															<span class="text-muted">SubQtd = <?php echo $sub_total_produtos;?> Un. / </span>
															<span class="text-muted">SubTotal = R$ <?php echo number_format($sub_total,2,",",".");?></span>																
														</div>
													</div>
												</div>
												
										</li>
										<?php
									}
								}
							?>
							<li class="list-group-item d-flex justify-content-between fundo">
								<span>Observa????es </span>
								<strong>: <?php echo utf8_encode($descricao); ?></strong>
							</li>
							<li class="list-group-item d-flex justify-content-between fundo">
								<span>Total de Itens </span>
								<strong>: <?php echo $cont_item; ?></strong>
							</li>
							<li class="list-group-item d-flex justify-content-between fundo">
								<span>Produtos: </span>
								<strong><?php echo $total_produtos;?> Unid.</strong>
							</li>
							<li class="list-group-item d-flex justify-content-between fundo">
								<span>Valor: </span>
								<strong>R$ <?php echo number_format($total_valor,2,",",".");?></strong>
							</li>
							<li class="list-group-item d-flex justify-content-between fundo">
								<span>Valor do Frete: </span>
								<strong>R$ <?php echo number_format($read_produto_view['ValorFrete'],2,",",".");?></strong>
							</li>
							<?php if($read_produto_view['FormaPagamento'] == 2) { ?>	
								<li class="list-group-item d-flex justify-content-between fundo">
									<span>Valor do Boleto: </span>
									<strong>R$ <?php echo number_format($read_produto_view['ValorBoleto'],2,",",".");?></strong>
								</li>
							<?php } ?>	
							<li class="list-group-item d-flex justify-content-between fundo">
								<span>Total: </span>
								<strong>R$ <?php echo number_format($valor_total,2,",",".");?></strong>
							</li>
						</ul>
					</div>
				</div>
			</div>				
		</div>
	</div>
</section>

<?php if(isset($_SESSION['Nome_Cliente'.$idSis_Empresa])){ ?>	
	<section id="service" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="ser-title">Finalizar!</h2>
					<hr class="botm-line">
				</div>
				<?php if(isset($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]]) && count($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]]) > '0') { ?>
					<div class="col-lg-12">
						<form name="FormularioEntrega" id="FormularioEntrega" method="post" action="finalizar_pedido.php">
							<div class="col-md-12 order-md-2 mb-4 img-prod-pag fundo-carrinho">
							
								<ul class="list-group mb-3 ">										
									<?php
										$total_venda = '0';
										$total_peso = '0';
										$total_produtos = '0';
										$item_carrinho = '0';
										if(count($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]]) > '0'){
											foreach($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]] as $id_produto_carrinho => $quantidade_produto_carrinho){
												$item_carrinho++;
												$read_produto_carrinho = mysqli_query($conn, "
												SELECT 
													TPS.idTab_Produtos_Pagamento,
													TPS.Nome_Prod,
													TPS.Arquivo,
													TPS.ValorProdutoSite,
													TPS.PesoProduto,
													TPS.ObsProduto,
													TOP2.Opcao AS Opcao2,
													TOP1.Opcao AS Opcao1,
													CONCAT(TPS.Nome_Prod, ' ' ,TOP2.Opcao, ' ' ,TOP1.Opcao) AS Produtos,
													TV.idTab_Valor_Pagamento,
													TV.Desconto,
													TV.QtdProdutoDesconto,
													TV.QtdProdutoIncremento,
													TV.ValorProduto,
													TV.Convdesc,
													TPR.Promocao,
													TPR.Descricao,
													TDSC.Desconto
												FROM 
													Tab_Produtos_Pagamento AS TPS
														LEFT JOIN Tab_Valor_Pagamento AS TV ON TV.idTab_Produtos_Pagamento = TPS.idTab_Produtos_Pagamento
														LEFT JOIN Tab_Opcao AS TOP2 ON TOP2.idTab_Opcao = TPS.Opcao_Atributo_1
														LEFT JOIN Tab_Opcao AS TOP1 ON TOP1.idTab_Opcao = TPS.Opcao_Atributo_2
														LEFT JOIN Tab_Desconto AS TDSC ON TDSC.idTab_Desconto = TV.Desconto
														LEFT JOIN Tab_Promocao AS TPR ON TPR.idTab_Promocao = TV.idTab_Promocao
												WHERE 
													TV.idTab_Valor_Pagamento = '".$id_produto_carrinho."'
												ORDER BY 
													TV.idTab_Valor_Pagamento ASC						
												");
												if(mysqli_num_rows($read_produto_carrinho) > '0'){
													
													foreach($read_produto_carrinho as $read_produto_carrinho_view){
													
														$idTab_Produto = $read_produto_carrinho_view['idTab_Produtos_Pagamento'];
														$quantidade_produto_incremento = $read_produto_carrinho_view['QtdProdutoIncremento'];
														$sub_total_qtd_produto = $quantidade_produto_carrinho * $quantidade_produto_incremento;
														$total_produtos += $sub_total_qtd_produto;
														$sub_total_peso = $quantidade_produto_carrinho * $read_produto_carrinho_view['PesoProduto'];
														$total_peso += $sub_total_peso;
														$sub_total_produto_carrinho = $quantidade_produto_carrinho * $read_produto_carrinho_view['ValorProduto'];
														$total_venda += $sub_total_produto_carrinho;
														$total = number_format($total_venda, 2, ",", ".");
														
													}
														
													
												} 
											?>		
												<li class="list-group-item d-flex justify-content-between lh-condensed fundo">

													<div class="row img-prod-pag">	
														<div class="col-md-12">	
															<div class="col-md-2">		
																<div class="row ">	
																	<div class="col-md-12">
																		<h4 class="my-0"><span class="text-muted">Item: </span><?php echo $item_carrinho;?> </h4> 
																	</div>															
																</div>
																<div class="row ">	
																	<div class="col-md-12 ">
																		<h5 class="my-0"><?php echo utf8_encode ($read_produto_carrinho_view['Desconto']);?></h5>
																		<h5 class="my-0"><?php echo utf8_encode ($read_produto_carrinho_view['Promocao']);?></h5>
																		<!--<h5 class="my-0"><?php echo utf8_encode ($read_produto_carrinho_view['Descricao']);?></h5>-->
																	</div>
																</div>
															</div>
															<div class="col-md-2">
																<div class="row ">	
																	<div class="col-md-12">
																		<img class="team-img img-circle img-responsive" src="<?php echo $idSis_Empresa ?>/produtos/miniatura/<?php echo $read_produto_carrinho_view['Arquivo']; ?>" alt="" width='100' >
																	</div>
																</div>															
															</div>
															<div class="col-md-3">
																<div class="row ">	
																	<div class="col-md-12 ">
																		<h5 class="my-0"><?php echo utf8_encode ($read_produto_carrinho_view['Nome_Prod']);?><br> 
																			<?php echo utf8_encode ($read_produto_carrinho_view['Opcao2']);?>
																			<?php echo utf8_encode ($read_produto_carrinho_view['Opcao1']);?></h5>
																		<h5 class="my-0"><?php echo utf8_encode ($read_produto_carrinho_view['Convdesc']);?></h5>
																		<!--<h5 class="my-0"><?php echo $read_produto_carrinho_view['QtdProdutoIncremento'];?> Unid.</h5>-->
																	</div>
																</div>															
															</div>	
															<div class="col-md-2">		
																<div class="row ">
																	<div class="col-md-12 ">
																		<h4 class="my-0"><span class="text-muted">SubQtd: </span> <span id="Qtd<?php echo $item_carrinho;?>"  name="prod[<?php echo $id_produto_carrinho ?>]" value="" ><?php echo $sub_total_qtd_produto ?> Un.</span><span class="text-muted"></span></h4> 
																	</div>														
																</div>
															</div>	
															<div class="col-md-3">		
																<div class="row ">
																	<div class="col-md-12 ">
																		<h4 class="my-0"><span class="text-muted">SubTotal: </span> R$<span id="Subtotal<?php echo $item_carrinho;?>" ><?php echo number_format($sub_total_produto_carrinho,2,",",".");?></span></h4> 
																	</div>														
																</div>
															</div>
														</div>	
													</div>
												</li>
											<?php
											}
										}
									?>
									<li class="list-group-item d-flex justify-content-between fundo">
										<span>Total de Itens </span>
										<strong>: <span  name="PCount" id="PCount" value="<?php echo $item_carrinho; ?>"><?php echo $item_carrinho; ?></span></strong>
									</li>
									<?php if($item_carrinho > 0) { ?>
										<li class="list-group-item d-flex justify-content-between fundo">
											<span>Total Produtos </span>
											<strong><span  name="TotalProd" id="TotalProd"><?php echo $total_produtos;?> Unid.</span></strong>
										</li>
										<li class="list-group-item d-flex justify-content-between fundo">
											<span>Valor Total </span>
											<strong>R$ <span  name="ValorTotal" id="ValorTotal"><?php echo $total;?></span></strong>
										</li>
									<?php } ?>
								</ul>
								<input type="hidden" name="ValorDinheiro"  id="ValorDinheiro" value="">
								<input type="hidden" name="Descricao"  id="Descricao" value=""></input>
								<input type="hidden" name="RecarregaCepDestino" id="RecarregaCepDestino" value="<?php echo $row_empresa['CepEmpresa'];?>">
								<input type="hidden" name="RecarregaLogradouro" id="RecarregaLogradouro" value="<?php echo $row_empresa['EnderecoEmpresa'];?>">
								<input type="hidden" name="RecarregaNumero" id="RecarregaNumero" value="<?php echo $row_empresa['NumeroEmpresa'];?>">
								<input type="hidden" name="RecarregaComplemento" id="RecarregaComplemento" value="<?php echo $row_empresa['ComplementoEmpresa'];?>">
								<input type="hidden" name="RecarregaBairro" id="RecarregaBairro" value="<?php echo $row_empresa['BairroEmpresa'];?>">
								<input type="hidden" name="RecarregaCidade" id="RecarregaCidade" value="<?php echo $row_empresa['MunicipioEmpresa'];?>">
								<input type="hidden" name="RecarregaEstado" id="RecarregaEstado" value="<?php echo $row_empresa['EstadoEmpresa'];?>">
								<input type="hidden" name="RecarregaReferencia" id="RecarregaReferencia" value="<?php echo $row_empresa['ReferenciaEmpresa'];?>">
						
								<input type="hidden" name="CepOrigem" id="CepOrigem" placeholder="CepOrigem" value="<?php echo $row_empresa['CepEmpresa'];?>">
								<input type="hidden" name="Peso" id="Peso" placeholder="Peso" value="<?php echo $total_peso; ?>">
								<input type="hidden" name="Formato" id="Formato" placeholder="Formato" value="1">
								<input type="hidden" name="Comprimento" id="Comprimento" placeholder="Comprimento" value="30">
								<input type="hidden" name="Largura" id="Largura" placeholder="Largura" value="15">									
								<input type="hidden" name="Altura" id="Altura" placeholder="Altura" value="5">
								<input type="hidden" name="Diametro" id="Diametro" placeholder="Diametro" value="0">		
								<input type="hidden" name="MaoPropria" id="MaoPropria" placeholder="MaoPropria" value="N">
								<input type="hidden" name="ValorDeclarado" id="ValorDeclarado" placeholder="ValorDeclarado" value="0">
								<input type="hidden" name="AvisoRecebimento" id="AvisoRecebimento" placeholder="AvisoRecebimento" value="N">							
								
								<input type="hidden" name="tipofrete" id="Retirada" value="1">
								<input type="hidden" name="localpagamento" id="OnLine" value="O" >
								<input type="hidden" name="formapagamento" id="FormaPagamento" value="1" >
								<div class="row">
									<div class="col-lg-12">							
										<div class="card card-outline-secondary my-4">								
											<div class="card-body">
														
												<!--<input type="submit" id="botao" name="botao" class="btn btn-danger btn-block finalizar" value="Finalizar Pedido">-->
												
												<!--<input type="submit" class="btn btn-md btn-danger btn-block" name="submeter" id="submeter" onclick="DesabilitaBotao(this.name)" value="Finalizar Pedido"/>-->
												<button type="submit" class="btn btn-primary btn-lg btn-block "  name="btnComprar" id="btnComprar"> Finalizar Pedido </button>
												<div class="alert alert-warning aguardar" role="alert" name="aguardar" id="aguardar">
													Aguarde um instante! Estamos processando sua solicitação!
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>	
					</div>
				<?php } else{ ?>
					<div class="col-md-6 card-body text-left">
						<br>
						<a href="meu_carrinho.php" class="btn btn-block btn-warning">Voltar ao Carrinho</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>						
<?php if(isset($_SESSION['id_Admin'.$idSis_Empresa])){ ?>

	<section id="service" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="container">	
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<br>
					<h1 class="ser-title">Faturas</h1>
					<hr class="botm-line">
				</div>
				<br>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 order-md-2 mb-4">
					<ul class="list-group mb-3 ">										
						<?php
							//Receber o numero da pagina
							$pagina_atual = filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_NUMBER_INT);
							$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
							//Setar a quantidade de itens
							$qnt_result_pg = 3;
							//Calcular o início da visualização
							$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
							$read_pedido = mysqli_query($conn, "SELECT 
																	OT.idApp_Pagamento,
																	OT.AprovadoOrca,
																	OT.QuitadoOrca,
																	OT.DataVencimentoOrca,
																	OT.AVAP,
																	OT.status,
																	OT.idApp_Cliente,
																	OT.ValorFrete,
																	OT.ValorFatura,
																	OT.FormaPagamento,
																	OT.pedido_data_hora,
																	OT.cod_trans,
																	OT.TipoFrete,
																	FP.FormaPag,
																	TF.TipoFrete AS Entrega,
																	SE.idSis_Empresa,
																	SE.NomeEmpresa
																FROM 
																	App_Pagamento AS OT
																		LEFT JOIN Tab_FormaPag AS FP ON FP.idTab_FormaPag = OT.FormaPagamento
																		LEFT JOIN Tab_TipoFrete AS TF ON TF.idTab_TipoFrete = OT.TipoFrete
																		LEFT JOIN Sis_Empresa AS SE ON SE.idSis_Empresa = OT.idSis_Empresa
																WHERE
																	OT.QuitadoOrca = 'N' AND
																	SE.idSis_Empresa != 1 AND
																	SE.idSis_Empresa != 5
																ORDER BY 
																	OT.idApp_Pagamento DESC
																LIMIT $inicio, $qnt_result_pg
																");
							//somar a quantidade de usuarios
							$result_pg = "
								SELECT 
									COUNT(OT.idApp_Pagamento) AS num_result,
									SE.idSis_Empresa,
									SE.NomeEmpresa  
								FROM 
									App_Pagamento AS OT
										LEFT JOIN Sis_Empresa AS SE ON SE.idSis_Empresa = OT.idSis_Empresa 
								WHERE 
									OT.QuitadoOrca = 'N' AND 
									SE.idSis_Empresa != 1 AND 
									SE.idSis_Empresa != 5 
							";
							
							$resultado_pg = mysqli_query($conn, $result_pg);
							
							$row_pg = mysqli_fetch_assoc($resultado_pg);
							
							//echo $row_pg['num_result'];
							
							$quantidade_pg = ceil($row_pg['num_result']/$qnt_result_pg);
							//Limitar os links antes e depois
							$max_links = 2;
							
							if($pagina > 1){
								echo "<a href='faturas.php?pagina=1'>Primeira</a> &nbsp;";
							}
							for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
								if($pag_ant >= 1){
									echo "<a href='faturas.php?pagina=$pag_ant'>$pag_ant</a> &nbsp;";
								}	
							}
							
							if($qnt_result_pg < $row_pg['num_result']){
								echo "$pagina &nbsp;"; 
							}
							for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
								if($pag_dep <= $quantidade_pg){
									echo "<a href='faturas.php?pagina=$pag_dep'>$pag_dep</a> &nbsp;";
								}	
							}
							if($pagina < $quantidade_pg){
								echo "<a href='faturas.php?pagina=$quantidade_pg'>Ultima</a> &nbsp;";
							}																
							
							if(mysqli_num_rows($read_pedido) > '0'){
								
								foreach($read_pedido as $read_pedido_view){
									
									$total = $read_pedido_view['ValorFatura'];
									
									if($read_pedido_view['AVAP'] == 'V'){
										$pagar = 'Na Loja';
									}elseif($read_pedido_view['AVAP'] == 'P'){
										$pagar = 'Na Entrega';
										}elseif($read_pedido_view['AVAP'] == 'O'){
										$pagar = 'On Line';
									}
									
									if($read_pedido_view['AprovadoOrca'] == 'N'){
										$status_pagamento = 'Em Análise';
									}else{
									
										if($read_pedido_view['QuitadoOrca'] == 'S'){
											$status_pagamento = 'Pago';
										}else{
											$status_pagamento = 'Aguardando';
											

											if($read_pedido_view['status'] == '0'){
												$status_pedido = 'Aguardando Pagamento';
											}
											if ($read_pedido_view['status'] == '1' || $read_pedido_view['status'] == '2'){
												
												$status_pedido = 'Aprovado & Aguardando Confirmação do Pagamento';
											}
											if ($read_pedido_view['status'] == '3' || $read_pedido_view['status'] == '4' || $read_pedido_view['status'] == '5'){
												
												$status_pedido = 'Aprovado & Pago';
											}
											if ($read_pedido_view['status'] == '7'){
												$status_pedido = 'Cancelado';
											}
											if ($read_pedido_view['status'] == '6' || $read_pedido_view['status'] == '8'){
												$status_pedido = 'Devolvido';
											}
											if ($read_pedido_view['status'] == '9'){
												$status_pedido = 'Retido';
											}
											
										}
									}	

									if($read_pedido_view['AprovadoOrca'] == 'S'){
										if($read_pedido_view['QuitadoOrca'] == 'N'){
											$cor = 'fundoAmarelo';
										}else{
											$cor = 'fundoAzulEscuro';
										}
									} else {
										$cor = 'fundoVermelho';
									}
									

									?>		
									<li class="list-group-item d-flex justify-content-between lh-condensed <?php echo $cor;?>">
										
										<div class="row img-prod-pag">
											<div class="row">
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ">
													<h5 class="my-0">Empresa: 
														<a style="color: #000000" href="pedido.php?id=<?php echo $read_pedido_view['idApp_Pagamento'];?>">
															<?php echo $read_pedido_view['NomeEmpresa'];?> - <?php echo $read_pedido_view['idSis_Empresa'];?>
														</a>
													</h5>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ">
													<h5 class="my-0">
														<a style="color: #000000" href="pedido.php?id=<?php echo $read_pedido_view['idApp_Pagamento'];?>">
															Fatura Nº <?php echo $read_pedido_view['idApp_Pagamento'];?>
														</a>
													</h5>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ">
													<h5 class="my-0">Total: R$ <?php echo number_format($total, 2, ",", ".");?> </h5>
												</div>	
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ">
													<h5 class="my-0">Vencimento: <?php echo date_format(new DateTime($read_pedido_view['DataVencimentoOrca']),'d/m/Y');?></h5>  
												</div>
											</div>
											<div class="row">
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ">
													<h5 class="my-0">Local Pag: <?php echo $pagar;?></h5>  
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ">
													<h5 class="my-0">
														<a style="color: #000000" <?php if($read_pedido_view['QuitadoOrca'] == 'N'){ ?> href="forma_pagamento.php?id=<?php echo $read_pedido_view['idApp_Pagamento'];?>" <?php } ?>>
															Forma Pag: <?php echo utf8_encode($read_pedido_view['FormaPag']);?>
														</a>
													</h5>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ">
													<h5 class="my-0">Status Pag: 
														<?php if($read_pedido_view['QuitadoOrca'] == 'S'){ ?>
															Pago
														<?php } else{?>	
															<?php if($read_pedido_view['status'] == '0'){ ?>
																<?php if($read_pedido_view['FormaPagamento'] == '3'){ ?>
																	Aguardando
																<?php } elseif($read_pedido_view['FormaPagamento'] == '9'){ ?>
																	<a href="baixa_fatura.php?id=<?php echo $read_pedido_view['idApp_Pagamento'];?>" for="<?php echo $read_pedido_view['idSis_Empresa'];?>" id="<?php echo $read_pedido_view['idApp_Pagamento'];?>" name="<?php echo $read_pedido_view['NomeEmpresa'];?>" data-confirm ='Tem certeza de que deseja dar baixa no item selecionado?'>Baixa</a>
																<?php } else { ?>
																	Defina Forma Pag.
																<?php } ?>
															<?php } else if($read_pedido_view['status'] == '1'){?>
															
															<?php } else {?>
																Aguardando	
															<?php } ?>
														<?php } ?>
													</h5>
												</div>
											</div>
										</div>
									</li>
									<?php
								}
							}
							//somar a quantidade de usuarios
							//$result_pg = "SELECT COUNT(idApp_Pagamento) AS num_result FROM App_Pagamento WHERE idSis_Empresa = '".$_SESSION['id_Cliente'.$idSis_Empresa]."'";
							$resultado_pg = mysqli_query($conn, $result_pg);
							$row_pg = mysqli_fetch_assoc($resultado_pg);
							//echo $row_pg['num_result'];
							$quantidade_pg = ceil($row_pg['num_result']/$qnt_result_pg);
							//Limitar os links antes e depois
							$max_links = 2;
							if($pagina > 1){
								echo "<a href='faturas.php?pagina=1'>Primeira</a> &nbsp;";
							}
							for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
								if($pag_ant >= 1){
									echo "<a href='faturas.php?pagina=$pag_ant'>$pag_ant</a> &nbsp;";
								}	
							}
							if($qnt_result_pg < $row_pg['num_result']){
								echo "$pagina &nbsp;"; 
							}	
							for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
								if($pag_dep <= $quantidade_pg){
									echo "<a href='faturas.php?pagina=$pag_dep'>$pag_dep</a> &nbsp;";
								}	
							}
							if($pagina < $quantidade_pg){
								echo "<a href='faturas.php?pagina=$quantidade_pg'>Ultima</a> &nbsp;";
							}
						?>
		
					</ul>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
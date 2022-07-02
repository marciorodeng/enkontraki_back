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
					<!--
					<div class="row">	
						<div class="col-lg-12">
							<h2 class="ser-title ">Serviços</h2>
							<hr class="botm-line">
							<div class="list-group">
								<?php
								/*
								foreach($read_categoria as $read_categoria_view){
									echo '<a href="produtos.php?cat='.$read_categoria_view['idTab_Catprod_Pagamento'].'" class="list-group-item">'.$read_categoria_view['Catprod_Pagamento'].'</a>';
								}
								*/
								?>
								
							</div>
						</div>
					</div>
					-->
				<?php
				
				}
				?>
			</div>
			
			<div class="col-md-9">
				<?php if(isset($_SESSION['id_Cliente'.$idSis_Empresa]) && isset($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]]) && count($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]]) > '0'){ ?>
					<div class="row">
						<div class="col-md-12">
							<input type="hidden" name="submeter" id="submeter">
							<a href="entrega.php" class="btn btn-primary btn-block" name="submeter2" id="submeter2" onclick="DesabilitaBotao(this.name)">Seu Carrinho contém: <?php echo $_SESSION['total_produtos'.$_SESSION['id_Cliente'.$idSis_Empresa]];?> Unid.<br> Se desejar Finalizar a compra,<br> click aqui.</a>
							<div class="alert alert-warning aguardar" role="alert" name="aguardar" id="aguardar">
								Aguarde um instante! Estamos processando sua solicitação!
							</div>
						</div>
					</div>
					<br>
				<?php } else{ ?>
					<input type="hidden" name="aguardar" id="aguardar">
				<?php } ?>
				<div class="row">
					<div class="col-md-12">
						<?php
							
							$manut = "
								SELECT 
									SE.idSis_Empresa,
									SE.DataDeValidade, 
									SE.ValorManutencao
								FROM 
									Sis_Empresa AS SE
								WHERE 
									SE.idSis_Empresa = '".$cliente."'
								LIMIT 1
							";
							
							$read_manut = $pdo->prepare($manut);	
							$read_manut->execute();
							$row_manut = $read_manut->fetch(PDO::FETCH_ASSOC);

							$result_manut = mysqli_query($conn, $manut);
							$count_result_manut = mysqli_num_rows($result_manut);
							$row_result_manut = mysqli_fetch_assoc($result_manut);
							
							if($count_result_manut > '0'){
								
								echo'<br>';
								echo $row_result_manut['idSis_Empresa'];
								echo'<br>';
								echo $row_result_manut['DataDeValidade'];
								echo'<br>';
								echo $row_result_manut['ValorManutencao'];
								echo'<br>';	
								
								$enkontraki = "
									SELECT 
										OT.idApp_OrcaTrata,
										OT.ValorEnkontraki,
										OT.Status_ValorEnkontraki
									FROM 
										App_OrcaTrata AS OT 
									WHERE 
										OT.idSis_Empresa = '".$row_result_manut['idSis_Empresa']."' AND
										OT.Tipo_Orca = 'O'
								";

								$result_enkontraki = mysqli_query($conn, $enkontraki);
								$count_result_enkontraki = mysqli_num_rows($result_enkontraki);
								$row_result_enkontraki = mysqli_fetch_assoc($result_enkontraki);
								
								echo $count_result_enkontraki;
								echo'<br>';
								
								if($count_result_enkontraki > '0'){
									$soma_valorenkontraki = 0;
									foreach($result_enkontraki as $result_enkontraki_view){
										echo'<br>';
										echo $result_enkontraki_view['idApp_OrcaTrata'];
										echo ' | ';
										echo $result_enkontraki_view['ValorEnkontraki'];
										echo ' | ';
										echo $result_enkontraki_view['Status_ValorEnkontraki'];
										$soma_valorenkontraki += $result_enkontraki_view['ValorEnkontraki'];
									}
								}else{
									echo 'Nenhum Pedido OnLine';
									$soma_valorenkontraki = 0;
								}
								
								echo'<br>';
								echo $soma_valorenkontraki;
								echo'<br>';
								
							}else{
								echo 'Nenhuma Empresa Selecionada';
							}
							
							
							/*
							echo'<br>';
							echo $row_manut['ValorManutencao'];
							echo'<br>';
							echo $row_manut['DataDeValidade'];
							echo'<br>';
							echo $row_result_manut['ValorManutencao'];
							echo'<br>';
							echo $row_result_manut['DataDeValidade'];
							echo'<br>';
							*/
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
								(TV.ValorProduto) AS SubTotal2
							FROM 
								Tab_Valor_Pagamento AS TV
							WHERE 
								TV.idTab_Modelo_Pagamento = '".$id_modelo."'
							");

							$valortotal2 = '0';
							if(mysqli_num_rows($read_produtos_derivados) > '0'){
								foreach($read_produtos_derivados as $read_produtos_derivados_view){
									$qtd_incremento = $read_produtos_derivados_view['QtdProdutoIncremento'];
									$subtotal2 		= $read_produtos_derivados_view['SubTotal2'];
									$valortotal2 	= $subtotal2;
									
									?>
									
									<div class="col-lg-4 col-md-4 col-sm-6 mb-4">
										<div class="img-produtos ">
											<!--<img class="team-img " src="<?php #echo $idSis_Empresa ?>/produtos/miniatura/<?php #echo $read_produtos_derivados_view['Arquivo']; ?>" alt="" class="img-circle img-responsive" width="200">-->
											<div class="card-body">
												<h5 class="card-title"> 
													<?php echo utf8_encode ($read_produtos_derivados_view['Convdesc']);?>
												</h5>
												<h5>
													<?php echo utf8_encode ($read_produtos_derivados_view['QtdProdutoIncremento']);?> Unid. R$ 
													<?php echo number_format($valortotal2,2,",",".");?>
												</h5>
											</div>
											<div class="card-body">
												<?php if(isset($_SESSION['id_Cliente'.$idSis_Empresa])){ ?>
													<?php if(isset($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]])){?>
														<?php if(count($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]]) < '1'){?>
															<a href="meu_carrinho.php?carrinho=produto&id=<?php echo $read_produtos_derivados_view['idTab_Valor_Pagamento'];?>" class="btn btn-success" name="submeter" id="submeter" onclick="DesabilitaBotao(this.name),exibirPagar()">Adicionar ao Carrinho</a>
														<?php } ?>
													<?php } else { ?>
														<a href="meu_carrinho.php?carrinho=produto&id=<?php echo $read_produtos_derivados_view['idTab_Valor_Pagamento'];?>" class="btn btn-success" name="submeter" id="submeter" onclick="DesabilitaBotao(this.name),exibirPagar()">Adicionar ao Carrinho</a>
													<?php } ?>
												<?php } else { ?>
													<a href="login_cliente.php" class="btn btn-success " name="submeter" id="submeter" onclick="DesabilitaBotao(this.name)">Logar P/ Adicionar ao Carrinho</a>
												<?php } ?>
											</div>
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

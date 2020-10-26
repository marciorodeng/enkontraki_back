<?php
	if(isset($_SESSION['id_Cliente'.$idSis_Empresa])){
		$cliente = $_SESSION['id_Cliente'.$idSis_Empresa];
	}else{
		unset(	$_SESSION['id_Cliente'.$idSis_Empresa],
				$_SESSION['Nome_Cliente'.$idSis_Empresa]
				);	
	}	
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
			<div class="col-lg-9">
				<?php if(isset($_SESSION['id_Cliente'.$idSis_Empresa]) && isset($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]]) && count($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]]) > '0'){ ?>
				<div class="row">	
					<div class="col-md-12">
						<label></label><br>
						<input type="hidden" name="submeter" id="submeter"/>
						<a href="entrega.php" class="btn btn-primary btn-block" name="submeter2" id="submeter2" onclick="DesabilitaBotao(this.name)">Seu Carrinho contém: <?php echo $_SESSION['total_produtos'.$_SESSION['id_Cliente'.$idSis_Empresa]];?> Unid.<br> Se desejar Finalizar a compra,<br> click aqui.</a>
						<div class="alert alert-warning " role="alert" name="aguardar" id="aguardar">
							Aguarde um instante! Estamos processando sua solicitação!
						</div>
					</div>
				</div>
				<br>
				<?php } ?>
				
				<div class="row">
					<?php
						if(isset($_GET['cat']) && $_GET['cat'] != ''){
							$id_cat = addslashes($_GET['cat']);
							$sql_categoria = "AND TP.Prodaux3_Pagamento = '".$id_cat."'";
							$sql_categoria_id = "AND idTab_Catprod_Pagamento = '".$id_cat."'";
						}else{
							$sql_categoria = '';
							$sql_categoria_id = '';
						}
						
						$result_categoria_id = "SELECT * FROM Tab_Catprod_Pagamento  ORDER BY Catprod_Pagamento ASC ";
						$read_categoria_id = mysqli_query($conn, $result_categoria_id);
								
						if(mysqli_num_rows($read_categoria_id) > '0'){
							foreach($read_categoria_id as $read_categoria_view_id){
								$id_catprod = $read_categoria_view_id['idTab_Catprod_Pagamento'];
								$result_produto_id = "SELECT * 
										FROM 
											Tab_Produto_Pagamento as TP
										ORDER BY 
											TP.Produtos_Pagamento ASC ";
								
								echo'
								<div class="col-md-12">
									<h2 class="ser-title">'.$read_categoria_view_id['Catprod_Pagamento'].'</h2>
									<hr class="botm-line">
								</div>';
								
								$read_produto_id = mysqli_query($conn, $result_produto_id);
								if(mysqli_num_rows($read_produto_id) > '0'){
									
									foreach($read_produto_id as $read_produto_view_id){
										echo'
										<div class="col-lg-4 col-md-6 col-sm-6 mb-4">
											<div class="img-produtos ">
												<a href="produtosderivados.php?id_modelo='.$read_produto_view_id['idTab_Produto_Pagamento'].'>"><img class="team-img " src="'.$idSis_Empresa.'/produtos/miniatura/'.$read_produto_view_id['Arquivo'].'" alt="" class="img-circle img-responsive" width="200"></a>					 
												<div class="card-body">
													<h5 class="card-title">
														<a href="produtosderivados.php?id_modelo='.$read_produto_view_id['idTab_Produto_Pagamento'].'">'.utf8_encode($read_produto_view_id['Produtos_Pagamento']).'</a>
													</h5>
												</div>
											</div>
										</div>
										';
									}
								}
							}
						}		
					?>
				</div>
			</div>
		</div>
	</div>
</section>

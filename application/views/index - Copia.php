<?php
	if(isset($_SESSION['id_Cliente'.$idSis_Empresa])){
		$cliente = $_SESSION['id_Cliente'.$idSis_Empresa];
	}else{
		unset(	$_SESSION['id_Cliente'.$idSis_Empresa],
				$_SESSION['Nome_Cliente'.$idSis_Empresa]
				);	
	}	
?>
<!--
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
						<div class="alert alert-warning aguardar" role="alert" name="aguardar" id="aguardar">
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
-->
<section id="about" class="section-padding2">
	<div class="container">
		<div class="row">
			<div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
				<div class="section-title">
					<h2 class="ser-title">A Plataforma<br></h2>
					<hr class="botm-line">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<p class="sec-para">xxxxx.</p>
							<a href="" style="color: #0cb8b6; padding-top:10px;">Saiba Mais..</a>
								
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							
								<figure >
									<div class="boxVideo">
										<iframe class="img-responsive thumbnail"  src="https://www.youtube.com/embed/videoseries?list=PLPP9yl-2bfZFWltdqkqZ2WSazBo7dnDx1" frameborder="0" allowfullscreen></iframe>
										
									</div>
								</figure>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--
<section id="service" class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-12">
				<h2 class="ser-title">Nossos Serviços</h2>
				<hr class="botm-line">
				<p>O universo dos pets vem ganhando cada vez mais espaço no Brasil. A oferta de pet shops do Brasil e produtos é imensa e cresce a cada dia.
					Seguindo sempre a tendência mundial, esses espaços contam com uma série de serviços e itens que tornam a vida dos animais de estimação e
					seus donos muito mais divertida e com mais praticidade. São remédios, produtos para beleza e cuidado dos animais.
				Tudo pensado para fornecer o melhor bem-estar, para garantir a qualidade de vida todos os dias na vida do seu pet.</p>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-6">
				<div class="service-info">
					<div class="icon">
						<i class="fa fa-medkit"></i>
					</div>
					<div class="icon-info">
						<h4>Suporte 24 horas por dia</h4>
						<p>Atendemos seu pet em qualquer horário, a saúde do seu animal é a nossa prioridade.</p>
					</div>
				</div>
				<div class="service-info">
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>
					<div class="icon-info">
						<h4>Nossa Motivação</h4>
						<p> Essa é nossa razão de ser.
							Somos apaixonados por pets! Essa não é apenas uma expressão inserida em nossa missão como empresa,
							mas uma realidade vivenciada todos os dias em nossas atitudes, nas lojas e em todos os nossos pontos
						de contato.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-6">
				<div class="service-info">
					<div class="icon">
						<i class="fa fa-user-md"></i>
					</div>
					<div class="icon-info">
						<h4>Porquê a Age Vet ?</h4>
						<p>A Age Vet oferece o que há de melhor e mais moderno no atendimento do seu animalzinho.
						Faça uma consulta com um de nossos profissionais e confira!.</p>
					</div>
				</div>
				<div class="service-info">
					<div class="icon">
						<i class="fa fa-line-chart"></i>
					</div>
					<div class="icon-info">
						<h4>Serviço Diferenciado</h4>
						<p>Sabemos que cada laço é único. Fonte de alegria, evolução, bem-estar.
							Temos experiência e oferecemos espaços, produtos e serviços – e tudo mais que for preciso –
						para que a relação entre pets e suas famílias seja melhor a cada dia.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
-->
<section id="cta-1" class="section-padding2">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="ser-title">Planos</h2>
				<hr class="botm-line">
			</div>
			<div class="schedule-tab">
				<div class="col-lg-4 col-md-6 col-sm-4 bor-left">
					<div class="mt-boxy-color"></div>
					<div class="medi-info">
						<h3>Plano1</h3>
						<p>xxx.</p>
						<a href="#" class="medi-info-btn">Saiba Mais</a>		    	
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-4">
					<div class="medi-info">
						<h3>Plano2</h3>
						<p>xxx.</p>
						<a href="#" class="medi-info-btn">Saiba Mais</a>	
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-4 bor-left">
					<div class="mt-boxy-color"></div>
					<div class="medi-info">
						<h3>Plano3</h3>
						<p>xxx.</p>
						<a href="#" class="medi-info-btn">Saiba Mais</a>		    	
					</div>
				</div>
				<!--
				<div class="col-md-4 col-sm-4 mt-boxy-3">
					<div class="mt-boxy-color"></div>
					<div class="time-info">
						<h3>Horário de Funcionamento</h3>
						<table style="margin: 8px 0px 0px;" border="1">
							<tbody>
								<tr>
									<td>xxx</td>
									<td></td>
								</tr>
								<tr>
									<td>xxx</td>
									<td></td>
								</tr>
								<tr>
									<td>xxx</td>
									<td></td>
								</tr>
							</tbody>
						</table>				    		
					</div>
				</div>
				-->
			</div>
		</div>
	</div>
</section>
<section id="testimonial" class="section-padding2">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="ser-title">Depoimentos</h2>
				<hr class="botm-line">
			</div>
			
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">		
				<div class="row">	
					<center>
						<figure >
							<div class="boxVideo">
								<iframe class="img-responsive thumbnail"  src="https://www.youtube.com/embed/videoseries?list=PLPP9yl-2bfZFWltdqkqZ2WSazBo7dnDx1" frameborder="0" allowfullscreen></iframe>
								
							</div>
						</figure>
					</center>
				</div>	
			</div>
			
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="testi-details">
					<!-- Paragraph -->
					<p>Texto de Depoimento 1.</p>
				</div>
				<div class="testi-info">
					<!-- User Image -->
					<a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
					<!-- User Name -->
					<h3>Nome<span>Cliente</span></h3>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="testi-details">
					<!-- Paragraph -->
					<p>Texto de Depoimento 2.</p>
				</div>
				<div class="testi-info">
					<!-- User Image -->
					<a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
					<!-- User Name -->
					<h3>Nome<span>Cliente</span></h3>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="dicas" class="section-padding2">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="ser-title">Dicas de Gestão</h2>
				<hr class="botm-line">
			</div>
			
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">		
				<div class="row">	
					<center>
						<figure >
							<div class="boxVideo">
								<iframe class="img-responsive thumbnail"  src="https://www.youtube.com/embed/videoseries?list=PLPP9yl-2bfZFWltdqkqZ2WSazBo7dnDx1" frameborder="0" allowfullscreen></iframe>
								
							</div>
						</figure>
					</center>
				</div>	
			</div>
			<!--
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="testi-details">
					
					<p>Texto de Depoimento 1.</p>
				</div>
				<div class="testi-info">
					
					<a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
					
					<h3>Nome<span>Cliente</span></h3>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="testi-details">
					
					<p>Texto de Depoimento 2.</p>
				</div>
				<div class="testi-info">
					
					<a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
					
					<h3>Nome<span>Cliente</span></h3>
				</div>
			</div>
			-->
		</div>
	</div>
</section>
		

<?php
	if(isset($_SESSION['id_Cliente'.$idSis_Empresa])){
		$cliente = $_SESSION['id_Cliente'.$idSis_Empresa];
	}else{
		unset(	$_SESSION['id_Cliente'.$idSis_Empresa],
				$_SESSION['Nome_Cliente'.$idSis_Empresa]
				);	
	}	
?>
<section id="about" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><!--class="section-title"-->
		<br>
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
</section>
<!--
<section id="service" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<h2 class="ser-title">Nossos Serviços</h2>
		<hr class="botm-line">
		<p>O universo dos pets vem ganhando cada vez mais espaço no Brasil. A oferta de pet shops do Brasil e produtos é imensa e cresce a cada dia.
			Seguindo sempre a tendência mundial, esses espaços contam com uma série de serviços e itens que tornam a vida dos animais de estimação e
			seus donos muito mais divertida e com mais praticidade. São remédios, produtos para beleza e cuidado dos animais.
		Tudo pensado para fornecer o melhor bem-estar, para garantir a qualidade de vida todos os dias na vida do seu pet.</p>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-3 col-xs-6">
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
	<div class="col-lg-4 col-md-4 col-sm-3 col-xs-6">
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
</section>
-->
<section id="cta-1" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h2 class="ser-title">Planos</h2>
		<hr class="botm-line">
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="schedule-tab">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 bor-left">
				<div class="mt-boxy-color"></div>
				<div class="medi-info">
					<h3>Plano1</h3>
					<p>xxx.</p>
					<a href="#" class="medi-info-btn">Saiba Mais</a>		    	
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 bor-left">
				<div class="medi-info">
					<h3>Plano2</h3>
					<p>xxx.</p>
					<a href="#" class="medi-info-btn">Saiba Mais</a>	
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 bor-left">
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
</section>
<section id="testimonial" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<br>
		<h2 class="ser-title">Depoimentos</h2>
		<hr class="botm-line">
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<center>
			<figure >
				<div class="boxVideo">
					<iframe class="img-responsive thumbnail"  src="https://www.youtube.com/embed/videoseries?list=PLPP9yl-2bfZFWltdqkqZ2WSazBo7dnDx1" frameborder="0" allowfullscreen></iframe>
					
				</div>
			</figure>
		</center>
	</div>
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

</section>
<section id="dicas" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<br>
		<h2 class="ser-title">Dicas de Gestão</h2>
		<hr class="botm-line">
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">	
		<center>
			<figure >
				<div class="boxVideo">
					<iframe class="img-responsive thumbnail"  src="https://www.youtube.com/embed/videoseries?list=PLPP9yl-2bfZFWltdqkqZ2WSazBo7dnDx1" frameborder="0" allowfullscreen></iframe>
					
				</div>
			</figure>
		</center>	
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

</section>
<section id="contact" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	
		
			<div class="col-md-12">
				<br>
				<h2 class="ser-title">Fale Conosco</h2>
				<hr class="botm-line">
				<!--
				<a id="mibew-agent-button" href="/mibew/chat?locale=en" target="_blank" onclick="Mibew.Objects.ChatPopups['5e73e3aadb299d07'].open();return false;">
					<img src="/mibew/b?i=mibew&amp;lang=en" class="img-responsive" border="0" alt="" width="500"/>
				</a>
				<br>
				-->
			</div>
			<!--
			<div class="col-md-12">
				<h2 class="ser-title">Envie um e-mail</h2>
				<hr class="botm-line">
			</div>
			-->
			<div class="col-md-4 col-sm-4">
				<h3>Informação e contato</h3>
				<div class="space"></div>
				<h4><?php echo utf8_encode($row_empresa['EnderecoEmpresa']);?>, <?php echo utf8_encode($row_empresa['NumeroEmpresa']);?> - <?php echo utf8_encode($row_empresa['ComplementoEmpresa']);?><br>
				<?php echo utf8_encode($row_empresa['BairroEmpresa']);?> - <?php echo utf8_encode($row_empresa['MunicipioEmpresa']);?> - <?php echo utf8_encode($row_empresa['EstadoEmpresa']);?><br>
				Cep: <?php echo $row_empresa['CepEmpresa'];?>.</h4>
				<div class="space"></div>
				<p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i><?php echo $row_empresa['Email'];?></p>
				<div class="space"></div>
				<p><i class="fa fa-phone fa-fw pull-left fa-2x"></i><h4>TEL:  <?php echo $row_empresa['Telefone'];?></h4></p>
			</div>
			
			<!--
			<div class="col-md-8 col-sm-8 marb20">
				<div class="contact-info">	
					
					<p id="resultado"></p>
					<form id="cadastrarUsuario" action=""  method="POST">
						
						<div class="form-group">
							<input type="Nome" name="Nome" class="form-control br-radius-zero" placeholder="Seu nome" data-rule="minlen:4" data-msg="Por favor, no mínimo 4 digitos" />
							<div class="validation"></div>
						</div>
						<div class="form-group">
							<input type="email" class="form-control br-radius-zero" name="email" placeholder="Seu E-mail" data-rule="email" data-msg="Por favor, use um e-mail válido" />
							<div class="validation"></div>
						</div>
						<div class="form-group">
							<textarea type="message" class="form-control br-radius-zero" name="message" rows="5" placeholder="Mensagem" data-rule="minlen:10" data-msg="Por favor, escreva algo para nós."></textarea>
							<div class="validation"></div>
						</div>
						<button type="submit" class="btn btn-primary pull-right">Enviar</button>
					</form>
				</div>
			</div>
			-->
		
	
</section>	

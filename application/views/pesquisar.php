<section id="pesquisar" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="container">	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<br>
				<h1 class="ser-title">Empresas</h1>
				<hr class="botm-line">
			</div>	
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">					
				<?php
					$empresa = ("
							SELECT 
								idSis_Empresa,
								NomeEmpresa,
								Site,
								Inativo,
								Arquivo
							FROM 
								Sis_Empresa
							WHERE 
								idSis_Empresa != 1 AND
								idSis_Empresa != 5 AND
								Inativo = 0
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
											<img class="team-img img-circle img-responsive" src="../<?php echo $read_empresa_view['Site'];?>/<?php echo $read_empresa_view['idSis_Empresa'] ?>/documentos/miniatura/<?php echo $read_empresa_view['Arquivo']; ?>" alt="">
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
		</div>
	</div>
</section>

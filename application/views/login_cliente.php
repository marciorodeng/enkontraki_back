<?php 
	
	if(isset($_GET['id_empresa'])){	
		
		$id_empresa = addslashes($_GET['id_empresa']);
		$_SESSION['ID_Empresa'] = $id_empresa;
		
		
		$result_empresa_login = "SELECT NomeEmpresa FROM Sis_Empresa WHERE idSis_Empresa = '".$_SESSION['ID_Empresa']."' LIMIT 1";
		$resultado_empresa_login = $pdo->prepare($result_empresa_login);
		$resultado_empresa_login->execute();
		$row_empresa_login = $resultado_empresa_login->fetch(PDO::FETCH_ASSOC);						
		/*
		echo '<br>';
		echo "<pre>";
		print_r($row_empresa_login['NomeEmpresa']);
		echo "</pre>";
		//exit ();
		*/	
	}
?>
<section id="service" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<br>
				<h1 class="ser-title">Login do Cliente</h1>
				<hr class="botm-line">
			</div>		
		</div>	
		<div class="row">
			<div class="form-signin text-left" style="background: #BC0723;">				
				<h3>Acesso do Cliente da Enkontraki</h3>
				<?php
					if(isset($_SESSION['msg'])){ ?>
						<h3 style="color: #FF0000"> <?php echo $_SESSION['msg'];?>!!</h3>
						<?php unset($_SESSION['msg']);?>
				<?php } ?>
				<?php	
					if(isset($_SESSION['msgcad'])){ ?>
						<h3 style="color: green"> <?php echo $_SESSION['msgcad'];?>!!</h3>
						<?php unset($_SESSION['msgcad']);?>
				<?php } ?>
				<br>
				<form method="POST" action="valida_cliente.php">
					<?php if(isset($_SESSION['ID_Empresa'])){ ?>	
						<h3><?php echo $row_empresa_login['NomeEmpresa'];?></h3>
						<input type="hidden" name="empresa"  id="empresa" value="<?php echo $_SESSION['ID_Empresa'];?>"><br>
					<?php }else{ ?>	
						<label>Digite o Número da Empresa</label>
						<input type="text" name="empresa"  id="empresa" placeholder="Ex: 12" maxlength="11" class="form-control"><br>
					<?php } ?>		
					<label>Digite o Celular do Admin cadastrado, com DDD.</label>
					<input type="text" name="celular"  id="celular" placeholder="Ex: 21987654321" maxlength="11" class="form-control"><br>
					
					<label>Digite a Senha cadastrada</label>
					<div class="input-group">
						<input type="password" name="senha" id="senha" placeholder="Digite a sua senha" class="form-control btn-sm ">
						<span class="input-group-btn">
							<button style="margin-top: -16px" class="btn btn-info btn-xs " type="button" onclick="mostrarSenha()">
								
								<span class="Mostrar glyphicon glyphicon-eye-open"></span>
								
								<span class="NMostrar glyphicon glyphicon-eye-close"></span>
								
							</button>
						</span>
					</div>				
					<input type="submit" name="btnLogin" value="Acessar" class="btn btn-success">
					<!--
					<div class="row text-center" style="margin-top: 20px;"> 
						Você ainda não está cadastrado? Então<a href="cadastrar_cliente.php"> Clique aqui </a> e cadastre-se!
					</div>
					-->
				</form>
				<!--
				<script>
					exibir();
					function exibir(){
						$('.Mostrar').show();
						$('.NMostrar').hide();
					}
					function mostrarSenha(){
						var tipo = document.getElementById("senha");
						if(tipo.type == "password"){
							tipo.type = "text";
							$('.Mostrar').hide();
							$('.NMostrar').show();
						}else{
							tipo.type = "password";
							$('.Mostrar').show();
							$('.NMostrar').hide();
						}
					}
				</script>
				-->
			</div>	
		</div>
	</div>
</section>			

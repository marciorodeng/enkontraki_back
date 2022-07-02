<?php
	if(isset($_SESSION['id_Cliente'.$idSis_Empresa])){
		$cliente = $_SESSION['id_Cliente'.$idSis_Empresa];
		}else{
		unset(	$_SESSION['id_Cliente'.$idSis_Empresa],
		$_SESSION['Nome_Cliente'.$idSis_Empresa]
		);	
	}	
?>

<section id="dicas" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="container">	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<br>
				<h1 class="ser-title">Dicas</h1>
				<hr class="botm-line">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<figure >
					<div class="boxVideo">
						<iframe class="img-responsive thumbnail" src="https://www.youtube.com/embed/chlLUZCsChk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</figure>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<figure >
					<div class="boxVideo">
						<iframe class="img-responsive thumbnail" src="https://www.youtube.com/embed/dYGTLLzg410" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</figure>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<figure >
					<div class="boxVideo">
						<iframe class="img-responsive thumbnail" src="https://www.youtube.com/embed/LsUc6KrLujs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</figure>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<figure >
					<div class="boxVideo">
						<iframe class="img-responsive thumbnail" src="https://www.youtube.com/embed/NpOr8dTslfI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</figure>
			</div>
		</div>
	</div>
</section>

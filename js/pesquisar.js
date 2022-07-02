
	$(document).ready(function(){
		$('a[data-confirm]').click(function(ev){
			var href = $(this).attr('href');
			var id_empresa = $(this).attr('for');
			var id_pagamento = $(this).attr('id');
			var nome_empresa = $(this).attr('name');
			
			//console.log(id);
			//console.log(name);
			
			if(!$('#confirm-baixa'+id_pagamento+'').length){
				$('body').append(
					'<div class="modal fade" id="confirm-baixa'+id_pagamento+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">\
						<div class="modal-dialog">\
							<div class="modal-content">\
								<div class="modal-header bg-danger text-white">\
									Empresa '+id_empresa+':<br> '+nome_empresa+' <br>Fatura: Nº '+id_pagamento+'\
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">\
										<span aria-hidden="true">&times;</span>\
									</button>\
								</div>\
								<div class="modal-body">\
									Tem certeza de que deseja dar baixa na Fatura: Nº '+id_pagamento+' ?\
								</div>\
								<div class="modal-footer">\
									<button type="button" class="btn btn-success" data-dismiss="modal">\
										Cancelar\
									</button>\
									<a class="btn btn-danger text-white" id="dataComfirmOK'+id_pagamento+'">\
										Confirmar Baixa\
									</a>\
								</div>\
							</div>\
						</div>\
					</div>'
				);
			}
			$('#dataComfirmOK'+id_pagamento+'').attr('href', href);
			$('#confirm-baixa'+id_pagamento+'').modal({show: true});
			return false;
			
		});
	});

	exibir();
	exibir_confirmar();

	function exibir(){
		$('.Mostrar').show();
		$('.NMostrar').hide();
	}

	function exibir_confirmar(){
		$('.Open').show();
		$('.Close').hide();
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

	function confirmarSenha(){
		var tipo = document.getElementById("confirmar");
		if(tipo.type == "password"){
			tipo.type = "text";
			$('.Open').hide();
			$('.Close').show();
		}else{
			tipo.type = "password";
			$('.Open').show();
			$('.Close').hide();
		}
	}
	
	//função autocomplete
	// função para limpeza dos campos do Cliente
	$('#id_Cliente_Auto').on('input', limpaCampos_Cliente);
	$("#NomeClienteAuto1").html('<label>Nenhum Cliente Selecionado!</label>');
	$('.CliSim').hide();
	$('.CliNao').show();
	
	// função que busca os nomes do Cliente			
	var id_empresa = $('#id_empresa').val();
	$("#id_Cliente_Auto").autocomplete({
		
		source: '../../site2_back/pesquisar/Cliente_Autocomplete.php?id_empresa='+ id_empresa,
		
		select: function(event, ui){
			var pegar = ui.item.value;
			console.log('pegar = '+pegar);
			var pegarSplit = pegar.split('#');
			var id_Cliente = pegarSplit[0];
			
			console.log('id cliente Autocomplete = '+id_Cliente);
			
			$.ajax({
				url: '../../site2_back/pesquisar/Cliente.php?id=' + id_Cliente,
				dataType: "json",
				success: function (data) {
						
					var idcliente = data[0]['id'];
					var nomecliente = data[0]['nome'];
					var celularcliente = data[0]['celular'];
					var telefone = data[0]['telefone'];
					var telefone2 = data[0]['telefone2'];
					var telefone3 = data[0]['telefone3'];
					
					$("#NomeClienteAuto1").html('<label>'+idcliente+ ' | ' + nomecliente + ' | Cel: ' + celularcliente + ' | Tel1: ' + telefone + ' | Tel2: ' + telefone2 + ' | Tel3: ' + telefone3 + '</label>');
					$('.CliSim').show();
					$('.CliNao').hide();
					$("#NomeClienteAuto").val(+idcliente+ ' | ' + nomecliente + ' | Cel: ' + celularcliente + ' | Tel1: ' + telefone + ' | Tel2: ' + telefone2 + ' | Tel3: ' + telefone3);
					
				},
				error:function(data){
					$("#NomeClienteAuto1").html('<label>Nenhum Cliente Selecionado!</label>');
					$('.CliSim').hide();
					$('.CliNao').show();
					$("#NomeClienteAuto").val('Nenhum Cliente Selecionado!');
				}
					
			});
			
			$('#idApp_Cliente').val(id_Cliente);
			/*
			clienteDep(id_Cliente);
			clientePet(id_Cliente);
			calculacashback(id_Cliente);
			buscaEnderecoCliente(id_Cliente);
			clienteOT(id_Cliente);
			*/
		}	
		
	});
	
	$('.input-empresa').hide();
	$('.input-produto').show();
	$('.input-promocao').hide();
	
	$('#SetEmpresa').on('click', function () {
		//alert('Copiando');
		$('.input-empresa').show();
		$('.input-produto').hide();
		$('.input-promocao').hide();
		$(".input_fields_empresa").empty();
		$('#Empresa').val('');
		$(".input_fields_produtos").empty();
		$('#Produto').val('');
		$(".input_fields_promocao").empty();
		$('#Promocao').val('');	
	});
	
	$('#SetProduto').on('click', function () {
		//alert('Copiando');
		$('.input-empresa').hide();
		$('.input-produto').show();
		$('.input-promocao').hide();
		$(".input_fields_empresa").empty();
		$('#Empresa').val('');
		$(".input_fields_produtos").empty();
		$('#Produto').val('');
		$(".input_fields_promocao").empty();
		$('#Promocao').val('');	
	});
	
	$('#SetPromocao').on('click', function () {
		//alert('Copiando');
		$('.input-empresa').hide();
		$('.input-produto').hide();
		$('.input-promocao').show();
		$(".input_fields_empresa").empty();
		$('#Empresa').val('');
		$(".input_fields_produtos").empty();
		$('#Produto').val('');
		$(".input_fields_promocao").empty();
		$('#Promocao').val('');	
	});
	
	// função que LIMPA busca de Empresa
	function limpaBuscaEmpresa(){
		$(".input_fields_empresa").empty();
		$('#Empresa').val('');
	}
	
	// função que LIMPA busca de Produto da empresa
	function limpaBuscaProduto(){
		$(".input_fields_produtos").empty();
		$('#Produto').val('');
	}
	
	// função que LIMPA busca de Promocao da empresa
	function limpaBuscaPromocao(){
		$(".input_fields_promocao").empty();
		$('#Promocao').val('');
	}
	
	// função que busca Empresa
	$('#Empresa').on('keyup', function () {
		//alert('empresa');
		var empresa = $('#Empresa').val();
		
		//console.log('empresa = '+empresa);
		$.ajax({
			url: '../../enkontraki_back/pesquisar/Empresa.php?empresa='+empresa,
			dataType: "json",
			success: function (data) {
				//console.log(data);
				//console.log(data.length);
				
				$(".input_fields_empresa").empty();
				// executo este laço para acessar os itens do objeto javaScript
				for (i = 0; i < data.length; i++) {
					
					data[i].ver 		= 'href="../'+data[i].site+'" target="_blank"';
					
					//console.log( data[i].nomeempresa );	
					
					const decoder = new TextDecoder();
					const encoder = new TextEncoder();
					
					data[i].novonomeempresa = encoder.encode(data[i].nomeempresa);
					data[i].novonomeempresa2 = decoder.decode(data[i].novonomeempresa);
					
					$(".input_fields_empresa").append('\
						<div class="form-group">\
							<div class="container-2">\
								<div class="col-xs-4 col-sm-2 col-md-2 col-lg-1">\
									<a '+data[i].ver+'>\
									<img class="team-img img-responsive" src="../'+data[i].site+'/'+data[i].id_empresa+'/documentos/miniatura/'+data[i].arquivo_empresa+'" alt="" width="50" >\
									</a>\
								</div>\
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-9 ">\
									<a '+data[i].ver+'>\
										<div class="row">\
											<span class="card-title" style="color: #000000">\
												'+data[i].novonomeempresa2+'\
											</span>\
											<span class="card-title busca-fonte3" style="color: #FF0000">\
												'+' | ' +data[i].id_empresa+'\
											</span>\
										</div>\
									</a>\
								</div>\
							</div>\
						</div>\
						<hr>'
					);						
					
				}//fim do laço		
				
			},
			error:function(data){
				//console.log('erro');
				$(".input_fields_empresa").empty();
			}
		});	
	});
	
	// função que busca Produtos da empresa
	$('#Produto').on('keyup', function () {
		//alert('produto');
		var produto = $('#Produto').val();
		//console.log('id_empresa = '+id_empresa);
		//console.log('produto = '+produto);
		$.ajax({
		url: '../../enkontraki_back/pesquisar/Produto.php?produto='+produto,
		dataType: "json",
		success: function (data) {
			//console.log(data);
			//console.log(data.length);
			
			$(".input_fields_produtos").empty();
			// executo este laço para acessar os itens do objeto javaScript
			for (i = 0; i < data.length; i++) {
				
				data[i].ver 		= 'href="../'+data[i].site+'/produto.php?id='+data[i].id_valor+'" target="_blank"';
				
				//console.log( data[i].contarestoque +' - '+ data[i].estoque);	
				
				if(data[i].contarestoque == "S"){
					data[i].contar = "S";
					if(data[i].estoque > 0){
						data[i].liberar = 'href="meu_carrinho.php?carrinho=produto&id='+data[i].id_valor+'"';
						data[i].carrinho = "carrinho_inserir.png";
						data[i].texto = "";
					}else{
						data[i].liberar = '';
						data[i].carrinho = "carrinho_indisp.png";
						data[i].texto = " | indisp. no momento";
					}
				}else{
					data[i].contar = "N";
					data[i].liberar = 'href="meu_carrinho.php?carrinho=produto&id='+data[i].id_valor+'"';
					data[i].carrinho = "carrinho_inserir.png";
					data[i].texto = "";
				}
				
				$(".input_fields_produtos").append('\
					<div class="form-group">\
						<div class="container-2">\
							<div class="col-xs-4 col-sm-2 col-md-2 col-lg-1">\
								<a '+data[i].ver+'>\
									<img class="team-img img-responsive" src="../'+data[i].site+'/'+data[i].id_empresa+'/documentos/miniatura/'+data[i].arquivo_empresa+'" alt="" width="50" >\
								</a>\
							</div>\
							<div class="col-xs-4 col-sm-2 col-md-2 col-lg-1">\
								<a '+data[i].ver+'>\
									<img class="team-img img-responsive" src="../'+data[i].site+'/'+data[i].id_empresa+'/produtos/miniatura/'+data[i].arquivo_produto+'" alt="" width="50" >\
								</a>\
							</div>\
							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-9 ">\
								<a '+data[i].ver+'>\
									<div class="row">\
										<span class="card-title" style="color: #000000">\
											'+data[i].nomeempresa+'\
										</span>\
										<span class="card-title busca-fonte3" style="color: #FF0000">\
											'+' | ' +data[i].id_empresa+'\
										</span>\
									</div>\
									<div class="row">\
										<span class="card-title" style="color: #000000">\
										'+data[i].nomeprod+'\
										</span>\
									</div>\
									<div class="row">\
										<span class="card-title" style="color: #000000">\
											'+data[i].descprod+'\
										</span>\
									</div>\
									<div class="row">\
										<span class="card-title" style="color: #000000">\
											'+data[i].qtdinc+' Unid | R$ '+data[i].valor+'\
										</span>\
									</div>\
									<div class="row">\
										<span class="card-title busca-fonte3" style="color: #000000">\
											'+data[i].codprod+'\
										</span>\
										<span class="card-title busca-fonte3" style="color: #FF0000">\
											'+' | ' +data[i].codbarra+'\
										</span>\
									</div>\
								</a>\
							</div>\
						</div>\
					</div>\
					<hr>'
				);						
				
			}//fim do laço		
			
		},
		error:function(data){
			//console.log('erro');
			$(".input_fields_produtos").empty();
		}
		});	
	});
	
	// função que busca Promocoes da empresa
	$('#Promocao').on('keyup', function () {
		//alert('promocao');
		var promocao = $('#Promocao').val();
		//console.log('id_empresa = '+id_empresa);
		//console.log('promocao = '+promocao);
		
		$.ajax({
			url: '../../enkontraki_back/pesquisar/Promocao.php?promocao='+promocao,
			dataType: "json",
			success: function (data) {
				//console.log(data);
				//console.log(data.length);
				$(".input_fields_promocao").empty();
				// executo este laço para acessar os itens do objeto javaScript
				for (i = 0; i < data.length; i++) {
					
					//console.log( data[i].id_promocao +' - '+ data[i].arquivo_promocao);
					data[i].liberar 	= 'href="meu_carrinho.php?carrinho=promocao&id='+data[i].id_promocao+'"';	
					data[i].ver 		= 'href="../'+data[i].site+'/produtospromocao.php?promocao='+data[i].id_promocao+'" target="_blank"';
					
					data[i].carrinho 	= "carrinho_inserir.png";
					/*
					if(data[i].contarestoque == "S"){
					data[i].contar = "S";
					if(data[i].estoque > 0){
					data[i].liberar = 'href="meu_carrinho.php?carrinho=promocao&id='+data[i].id_promocao+'"';
					data[i].texto = "";
					}else{
					data[i].liberar = '';
					data[i].texto = " | indisp. no momento";
					}
					}else{
					data[i].contar = "N";
					data[i].liberar = 'href="meu_carrinho.php?carrinho=promocao&id='+data[i].id_promocao+'"';
					data[i].texto = "";
					}
					*/
					const decoder = new TextDecoder();
					const encoder = new TextEncoder();
					
					data[i].novonomeempresa = encoder.encode(data[i].nomeempresa);
					data[i].novonomeempresa2 = decoder.decode(data[i].novonomeempresa);				
					
					$(".input_fields_promocao").append('\
						<div class="form-group">\
							<div class="row">\
								<div class="container-2">\
									<div class="col-xs-4 col-sm-2 col-md-2 col-lg-1">\
										<a '+data[i].ver+'>\
											<img class="team-img img-responsive" src="../'+data[i].site+'/'+data[i].id_empresa+'/documentos/miniatura/'+data[i].arquivo_empresa+'" alt="" width="50" >\
										</a>\
									</div>\
									<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">\
										<a '+data[i].ver+'>\
											<img class="team-img img-responsive" src="../'+data[i].site+'/'+data[i].id_empresa+'/promocao/miniatura/'+data[i].arquivo_promocao+'" alt="" width="50" >\
										</a>\
									</div>\
									<div class="col-xs-8 col-sm-10 col-md-10 col-lg-10">\
										<a '+data[i].ver+'>\
											<div class="row">\
												<span class="card-title" style="color: #000000">\
													'+data[i].novonomeempresa2+'\
												</span>\
												<span class="card-title busca-fonte3" style="color: #FF0000">\
													'+' | ' +data[i].id_empresa+'\
												</span>\
											</div>\
											<div class="row">\
												<span class="card-title" style="color: #000000">\
													'+data[i].promocao+'\
												</span>\
											</div>\
											<div class="row">\
												<span class="card-title" style="color: #000000">\
													'+data[i].descricao+'\
												</span>\
											</div>\
											<div class="row">\
												<span class="card-title" style="color: #000000">\
													'+data[i].total+'\
												</span>\
											</div>\
										</a>\
									</div>\
								</div>\
							</div>\
						</div>\
						<hr>'
					);				
					
				}//fim do laço	
			},
			error:function(data){
				//console.log('erro');
				//console.log(data);
				$(".input_fields_promocao").empty();
			}
		});	
		
	});
	
	// Função para limpar os campos caso a busca esteja vazia
	function limpaCampos_Cliente(){
		var busca = $('#id_Cliente_Auto').val();
		
		if(busca == ""){
		
			$('#idApp_Cliente').val('');
			/*
			$('#idApp_ClienteDep').val('0');
			$('#idApp_ClienteDep').hide();
			$('#Dep').val('');
			$('#Dep').hide();
			$('#idApp_ClientePet').val('0');
			$('#idApp_ClientePet').hide();
			$('#Pet').val('');
			$('#Pet').hide();
			
			$('#CashBackOrca').val('0,00');
			$('#ValidadeCashBackOrca').val('');
			*/
			$("#NomeClienteAuto1").html('<label>Nenhum Cliente Selecionado!</label>');
			$('.CliSim').hide();
			$('.CliNao').show();
			$("#NomeClienteAuto").val('Nenhum Cliente Selecionado!');
			/*
			$('#Cep').val('');
			$('#Logradouro').val('');
			$('#Numero').val('');
			$('#Complemento').val('');
			$('#Bairro').val('');
			$('#Cidade').val('');
			$('#Estado').val('');
			$('#Referencia').val('');
			*/
		}
	}	
	
	$(document).ready(function () {
	
		$(".Date").mask("99/99/9999");
		$(".Cnpj").mask("99.999.999/9999-99");
		$(".Time").mask("99:99");
		$(".Cpf").mask("99999999999");
		$(".Cep").mask("99999999");
		$(".Rg").mask("999999999");
		$(".TituloEleitor").mask("9999.9999.9999");
		$(".Valor").mask("#.##0,00", {reverse: true});
		$(".ValorPeso").mask("#.##0,000", {reverse: true});
		$(".Peso").mask("#.##0,000", {reverse: true});
		$('.Numero').mask('0#');
		
		$(".Celular").mask("99999999999");
		$(".CelularVariavel").on("blur", function () {
			var last = $(this).val().substr($(this).val().indexOf("-") + 1);
			
			if (last.length == 3) {
				var move = $(this).val().substr($(this).val().indexOf("-") - 1, 1);
				var lastfour = move + last;
				
				var first = $(this).val().substr(0, 9);
				
				$(this).val(first + '-' + lastfour);
			}
		});
		
	});	
<?php 
	
	$data['Ano'] = date('Y', time());
	$data['Mes'] = date('m', time());
	$data['Dia'] = date('d', time());

	if($data['Dia'] <= 28){
		
		if($data['Dia'] <= 26){
			$data['Diaref'] = $data['Dia'] + 2;
			$data['Qtd'] = "0";
		}elseif($data['Dia'] == 27){
			$data['Diaref'] = "01";
			$data['Qtd'] = "1";
		}elseif($data['Dia'] == 28){
			$data['Diaref'] = "02";
			$data['Qtd'] = "1";
		}
		
		$data['DataRef'] = date($data['Ano'].'-'.$data['Mes'].'-'.$data['Diaref']);

		$data['DataValidade'] = date('Y-m-d', strtotime('+'.$data['Qtd']. ' month',strtotime($data['DataRef'])));	
		/*
		echo "<pre>";
		echo "<br>";
		print_r($data['Dia']);
		echo "<br>";
		print_r($data['Mes']);
		echo "<br>";
		print_r($data['Ano']);
		echo "<br>";
		print_r($data['Diaref']);
		echo "<br>";
		print_r($data['Qtd']);
		echo "<br>";
		print_r($data['DataRef']);
		echo "<br>";
		print_r($data['DataValidade']);
		echo "</pre>";
		//exit();
		*/
		$empresas = "
			SELECT 
				SE.idSis_Empresa,
				SE.DataDeValidade, 
				SE.ValorManutencao
			FROM 
				Sis_Empresa AS SE
			WHERE
				SE.DataDeValidade = '".$data['DataValidade']."' AND
				SE.idSis_Empresa != 1 AND
				SE.Inativo = 0
		";

		$result_empresas = mysqli_query($conn, $empresas);
		
		$count_result_empresas = mysqli_num_rows($result_empresas);
		/*
		echo'<pre>';
		echo'<br>';
		echo $empresas;
		echo'<br>';
		echo $count_result_empresas;
		echo'<br>';
		//echo $result_empresas;
		echo'<br>';
		echo'</pre>';
		//exit();
		*/
		$row_result_empresas = mysqli_fetch_assoc($result_empresas);

		if($count_result_empresas > '0'){
			
			foreach($result_empresas as $result_empresas_view){
				/*
				echo'<br>';
				echo $result_empresas_view['idSis_Empresa'];
				echo'<br>';
				echo $result_empresas_view['DataDeValidade'];
				echo'<br>';
				*/
				
				$enkontraki = "
					SELECT
						OT.idApp_OrcaTrata,
						OT.ValorEnkontraki
					FROM 
						App_OrcaTrata AS OT 
					WHERE 
						OT.idSis_Empresa = '".$result_empresas_view['idSis_Empresa']."' AND
						OT.Tipo_Orca = 'O' AND
						OT.idApp_Pagamento = '0' AND
						OT.FinalizadoOrca = 'S' AND
						OT.CanceladoOrca = 'N'
				";

				$result_enkontraki = mysqli_query($conn, $enkontraki);
				
				$count_result_enkontraki = mysqli_num_rows($result_enkontraki);
				
				$row_result_enkontraki = mysqli_fetch_assoc($result_enkontraki);

				if($count_result_enkontraki > '0'){
					
					$soma_valorenkontraki = 0;
					
					foreach($result_enkontraki as $result_enkontraki_view){

						$soma_valorenkontraki += $result_enkontraki_view['ValorEnkontraki'];
					
						if($soma_valorenkontraki >= $result_empresas_view['ValorManutencao']){
							$valor_fatura = $soma_valorenkontraki;
						}else{
							$valor_fatura = $result_empresas_view['ValorManutencao'];
						}
						
					}
					
					//echo'<br>';
					
				}else{
					
					$soma_valorenkontraki = 0;
					$valor_fatura = $result_empresas_view['ValorManutencao'];
				}

				$insert_fatura = "
					INSERT INTO 
						App_Pagamento(
							idSis_Empresa,
							idApp_Cliente,
							DataVencimentoOrca,
							ValorFatura
						) 
						VALUES(	
							'".$result_empresas_view['idSis_Empresa']."',
							'".$result_empresas_view['idSis_Empresa']."',
							'".$result_empresas_view['DataDeValidade']."',
							'".$valor_fatura."'
						)
				";
				mysqli_query($conn, $insert_fatura);
				
				$id_pagamento = mysqli_insert_id($conn);
				
				//echo 'id_pagamento = ' . $id_pagamento;			
				
				if(isset($id_pagamento)){
				
					$insert_pagamento_produto = "
						INSERT INTO 
							App_Produto_Pagamento(
								idApp_Cliente,
								idSis_Empresa,
								idApp_Pagamento,
								ValorProduto,
								QtdProduto,
								NomeProduto
							) 
							VALUES(
								'".$result_empresas_view['idSis_Empresa']."',
								'".$result_empresas_view['idSis_Empresa']."',
								'".$id_pagamento."',
								'".$valor_fatura."',
								'1',
								'MANUTENCAO'
							)
					";
					
					$result_insert_pagamento_produto = mysqli_query($conn, $insert_pagamento_produto);			
					
					$insert_parcela = "
						INSERT INTO 
							App_Parcelas_Pagamento(
								Quitado,
								DataVencimento,
								ValorParcela,
								Parcela,
								idApp_Cliente,
								idSis_Empresa,
								idApp_Pagamento
							) 
							VALUES(
								'N',
								'".$result_empresas_view['DataDeValidade']."',
								'".$valor_fatura."',
								'1/1',
								'".$result_empresas_view['idSis_Empresa']."',
								'".$result_empresas_view['idSis_Empresa']."',
								'".$id_pagamento."'
							)
						";
					$result_insert_parcela = mysqli_query($conn, $insert_parcela);				
					
					if($count_result_enkontraki > '0'){

						foreach($result_enkontraki as $result_enkontraki_view){
							
							$id_orcatrata = $result_enkontraki_view['idApp_OrcaTrata'];
							
							$update_pedido = "
								UPDATE 
									App_OrcaTrata 
								SET 
									idApp_Pagamento = '".$id_pagamento."'
								WHERE 
									idApp_OrcaTrata = '".$id_orcatrata."'
							";
							$result_update_pedido = mysqli_query($conn, $update_pedido);
									
						}
						//echo'<br>';
					}
				}
				//echo '<hr>';
			}
			//exit();
		}else{
			/*
			echo'<br>';
			echo 'Nenhuma Empresa Selecionada';
			exit();
			*/
		}
	}else{
		/*
		echo'<br>';
		echo 'Nenhum Faturamento Agendado para esta data';
		exit();
		*/
	}
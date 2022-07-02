<?php

if(isset($_GET['id'])){	

	$id_pagamento = addslashes($_GET['id']);
	/*
	echo "<pre>";
	echo "<br>";
	print_r($id_pagamento);
	echo "<br>";
	echo "</pre>";
	//exit();
	*/

	$query_car = "	SELECT
						idSis_Empresa,
						status
					FROM 
						App_Pagamento
					WHERE 
						idApp_Pagamento = '" . $id_pagamento . "'
					LIMIT 1";

	$resultado_car = $pdo->prepare($query_car);
	$resultado_car->execute();

	while ($row_car = $resultado_car->fetch(PDO::FETCH_ASSOC)) {
		$id_empresa = $row_car['idSis_Empresa'];
		$status = $row_car['status'];
	}

	$query_empresa = "	
					SELECT 
						DataDeValidade
					FROM 
						Sis_Empresa
					WHERE 
						idSis_Empresa = '" . $id_empresa . "'
					LIMIT 1";

	$resultado_empresa = $pdo->prepare($query_empresa);
	$resultado_empresa->execute();

	while ($row_empresa = $resultado_empresa->fetch(PDO::FETCH_ASSOC)) {
		$datavalidade = $row_empresa['DataDeValidade'];
	}	

	$datadehoje = date('Y-m-d');
	/*
	echo "<pre>";
	echo "<br>";
	print_r($id_empresa);
	echo "<br>";
	print_r($id_pagamento);
	echo "<br>";
	print_r($status);
	echo "<br>";
	print_r($datavalidade);
	echo "<br>";
	echo "</pre>";
	exit();
	*/
	if(isset($status) && $status == '0'){	
		
		$curl2=$pdo->prepare("update App_Pagamento set AprovadoOrca=?, QuitadoOrca=?, DataPagoOrca=?, status=?   where idApp_Pagamento=?");
		$curl2->bindValue(1,'S');
		$curl2->bindValue(2,'S');
		$curl2->bindValue(3,$datadehoje);
		$curl2->bindValue(4,5);
		$curl2->bindValue(5,$id_pagamento);	
		$curl2->execute();
		
		$curl3=$pdo->prepare("update App_Parcelas_Pagamento set Quitado=?, DataPago=?  where idApp_Pagamento=?");
		$curl3->bindValue(1,'S');
		$curl3->bindValue(2,$datadehoje);
		$curl3->bindValue(3,$id_pagamento);	
		$curl3->execute();
		
		$curl1=$pdo->prepare("update Sis_Empresa set DataDeValidade=? where idSis_Empresa=?");

		$curl1->bindValue(1,date('Y-m-d', strtotime('+1 month',strtotime($datavalidade))));
		$curl1->bindValue(2,$id_empresa);	
		$curl1->execute();
		
	}
	
	//exit();
	echo '<script> window.location = "faturas.php" </script>';	
}
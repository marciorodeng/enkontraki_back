<?php 
	
	$id_pagamento = filter_input(INPUT_POST,'id_pagamento');
	$formapagamento = filter_input(INPUT_POST,'formapagamento');

	$id_pagamento = addslashes($id_pagamento);
	$formapagamento = addslashes($formapagamento);
	
	/*
	echo "<pre>";
	echo "<br>";
	print_r($id_pagamento);
	echo "<br>";
	print_r($formapagamento);
	echo "<br>";
	echo "</pre>";
	exit();
	*/

	$update_pagamento = "
		UPDATE 
			App_Pagamento 
		SET 
			FormaPagamento = '".$formapagamento."'
		WHERE 
			idApp_Pagamento = '".$id_pagamento."'
	";
	$result_update_pagamento = mysqli_query($conn, $update_pagamento);
	
	if(isset($_SESSION['id_Admin'.$idSis_Empresa])){
		echo '<script> window.location = "faturas.php" </script>';
	}else{	
		if($formapagamento == "3"){
			echo '<script> window.location = "pagar.php?id='.$id_pagamento.'" </script>';
		}else{
			echo '<script> window.location = "deposito.php?id='.$id_pagamento.'" </script>';
		}
	}	
	unset($id_pagamento); 
	unset($formapagamento);			
	exit();
?>
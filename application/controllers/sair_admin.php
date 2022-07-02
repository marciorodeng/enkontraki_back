<?php
unset(	$_SESSION['id_Admin'.$idSis_Empresa], 
		$_SESSION['Nome_Admin'.$idSis_Empresa]	
		);

//$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: index.php");
//header("Location: inicial.php");
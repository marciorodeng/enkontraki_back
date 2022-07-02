<?php

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	
	$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if(isset($celular) && isset($senha) && !empty($celular) && !empty($senha)){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT *
							FROM 
								Sis_Empresa 
							WHERE 
								idSis_Empresa = 1 AND
								CelularAdmin = '".$celular."' AND
								Senha = '".md5($senha)."' 
							LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$row_usuario = mysqli_fetch_array($resultado_usuario, MYSQLI_ASSOC);
		
		$count = mysqli_num_rows($resultado_usuario);
		
		if($count ==0){
			$_SESSION['msg'] = "Login e/ou Senha incorretos!";
			header("Location: login_admin.php");
		}else{
			$_SESSION['id_Admin'.$idSis_Empresa] = $row_usuario['idSis_Empresa'];
			$_SESSION['Nome_Admin'.$idSis_Empresa] = $row_usuario['NomeAdmin'];
			
			//header("Location: index.php");
			header("Location: sair.php");
			
		}
		
	}else{
		$_SESSION['msg'] = "Login e/ou Senha incorretos!";
		header("Location: login_admin.php");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: login_admin.php");
}

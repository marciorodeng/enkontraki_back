<?php

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
	$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT *
							FROM 
								Sis_Empresa 
							WHERE 
								idSis_Empresa = '" .$empresa. "' AND
								CelularAdmin = '".$celular."' AND
								Senha = '".md5($senha)."' 
							LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$row_usuario = mysqli_fetch_array($resultado_usuario, MYSQLI_ASSOC);
		
		$count = mysqli_num_rows($resultado_usuario);
		
		if($count ==0){
			$_SESSION['msg'] = "Login e/ou Senha incorretos!";
			header("Location: login_cliente.php");
		}else{
			$_SESSION['id_Cliente'.$idSis_Empresa] = $row_usuario['idSis_Empresa'];
			$_SESSION['Nome_Cliente'.$idSis_Empresa] = $row_usuario['NomeEmpresa'];
			$_SESSION['Logo_Cliente'.$idSis_Empresa] = $row_usuario['Arquivo'];
			$_SESSION['Site_Cliente'.$idSis_Empresa] = $row_usuario['Site'];
			$_SESSION['Email_Cliente'.$idSis_Empresa] = $row_usuario['Email'];
			$_SESSION['CelularCliente'.$idSis_Empresa] = $row_usuario['CelularAdmin'];
			$_SESSION['Cep_Cliente'.$idSis_Empresa] = $row_usuario['CepEmpresa'];
			$_SESSION['Endereco_Cliente'.$idSis_Empresa] = $row_usuario['EnderecoEmpresa'];
			$_SESSION['Numero_Cliente'.$idSis_Empresa] = $row_usuario['NumeroEmpresa'];
			$_SESSION['Complemento_Cliente'.$idSis_Empresa] = $row_usuario['ComplementoEmpresa'];
			$_SESSION['Bairro_Cliente'.$idSis_Empresa] = $row_usuario['BairroEmpresa'];
			$_SESSION['Cidade_Cliente'.$idSis_Empresa] = $row_usuario['MunicipioEmpresa'];
			$_SESSION['Estado_Cliente'.$idSis_Empresa] = $row_usuario['EstadoEmpresa'];
			
			//header("Location: produtos_cliente.php");
			if(isset($_SESSION['carrinho'.$_SESSION['id_Cliente'.$idSis_Empresa]])){
				header("Location: meu_carrinho.php");			
			}else{	
				header("Location: index.php");
				//header("Location: inicial.php");
				//header("Location: produtos.php");
			}
			
		}
		
	}else{
		$_SESSION['msg'] = "Login e/ou Senha incorretos!";
		header("Location: login_cliente.php");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: login_cliente.php");
}
